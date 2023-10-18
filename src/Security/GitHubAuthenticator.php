<?php
# src/Security/GitHubAuthenticator.php
namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use League\OAuth2\Client\Provider\GithubResourceOwner;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

class GitHubAuthenticator extends OAuth2Authenticator
{
    private ClientRegistry $clientRegistry;
    private EntityManagerInterface $entityManager;
    private RouterInterface $router;

    public function __construct(ClientRegistry $clientRegistry, EntityManagerInterface $entityManager, RouterInterface $router)
    {
        $this->clientRegistry = $clientRegistry;
        $this->entityManager = $entityManager;
        $this->router = $router;
    }

    public function supports(Request $request): ?bool
    {
        // continue ONLY if the current ROUTE matches the check ROUTE
        return $request->attributes->get('_route') === 'github.check';
    }

    public function authenticate(Request $request): Passport
    {
        $client = $this->clientRegistry->getClient('github');
        $accessToken = $this->fetchAccessToken($client);

        return new SelfValidatingPassport(
            new UserBadge($accessToken->getToken(), function () use ($accessToken, $client) {
                /** @var GithubResourceOwner $gitHubClient */
                $gitHubClient = $client->fetchUserFromToken($accessToken);
                // have they logged in with Google before? Easy!
                //on vérifie si l'utilisateur existe déjà
                $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['googleId' => $gitHubClient->getId()]);
                $response = $gitHubClient->toArray(); // on récupère les infos renvoyées par GitHub
                //Si l'utilisateur n'existe pas, on le créé !
                if (!$existingUser) {
                    $existingUser = new User();
                    $existingUser->setEmail($response['email']);
                    $existingUser->setGoogleId($response['id']);
                    $existingUser->setName($response['name']);
                    $existingUser->setAvatar($response['avatar_url']);
                    $existingUser->setAccess("H");
                    $existingUser->setIsVerified(false);
                    $this->entityManager->persist($existingUser);

                }
                $this->entityManager->flush(); // On écrit la requête dans la table USER
                return $existingUser;
            })
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // on redirige vers home la page d'accueil
        // on prépare les variables de session
        $avatar=$token->getUser()->getAvatar();
        $name=$token->getUser()->getName();
        $request->getSession()->set('avatar', $avatar);
        $request->getSession()->set('name', $name);


        return new RedirectResponse(
            $this->router->generate('app.home')
        );
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $message = strtr($exception->getMessageKey(), $exception->getMessageData());

        return new Response($message, Response::HTTP_FORBIDDEN);
    }

}