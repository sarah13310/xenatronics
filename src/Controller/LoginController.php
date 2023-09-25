<?php

namespace App\Controller;

use App\Form\ForgetPasswordType;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use App\Service\SendMailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    private function loadmenu($file)
    {
        $people_json = file_get_contents($file);
        $tab_json = json_decode($people_json, false);
        return $tab_json;
    }

    #[Route(path: '/login', name: 'app.login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app.home', ['auth' => False]);
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        if ($error){
            $this->addFlash('danger',$error->getMessage());
        }

        return $this->render('security/login.html.twig',
            ['last_username' => $lastUsername,
                'label' =>"danger",
                'menu' => $this->loadMenu("data/menu.json")
            ]
        );
    }


    #[Route(path: '/logout', name: 'app.logout')]
    public function logout(): void
    {
        $this->getRequest()->getSession()->clear();
        //throw new \LogicException("Error Login");
    }

    #[Route('/forget/password', name: 'forget.password')]
    public function forgottenPassword(Request                 $request,
                                      UserRepository          $userRepository,
                                      TokenGeneratorInterface $tokenGenerator,
                                      EntityManagerInterface  $entityManager,
                                      SendMailService         $mail): Response
    {
        $form = $this->createForm(ForgetPasswordType::class);
        $form->handleRequest($request);
        $user = $userRepository->findOneBy(["email" => $form->get('email')->getData()]);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($user) {

                $token = $tokenGenerator->generateToken();
                $user->setResetToken($token);
                $entityManager->persist($user);
                $entityManager->flush();
                // On génère un lien de réinitialisation du mot de passe
                $url = $this->generateUrl('reset.password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);
                // On crée les données du mail
                $context = compact('url', 'user');
                $mail->send(
                    'no-reply@xendev.me',
                    //$user->getEmail(),
                    'sarah13310@proton.me',
                    'Réinitialisation de mot de passe',
                    'register',
                    $context
                );
                $this->addFlash("success", "Message envoyé avec succès!");
            } else {
                $this->addFlash("danger", "Cet utilisateur n'est pas disponible.");
            }
            return $this->redirectToRoute('app.login');
        }
        return $this->render('security/forgetpassword.html.twig',
            [
                'menu' => $this->loadMenu("data/menu.json"),
                'form' => $form->createView(),
            ]
        );
    }

    #[Route('/reset/password/{token}', name: 'reset.password')]
    public function resetPassword(string                      $token,
                                  Request                     $request,
                                  UserRepository              $userRepository,
                                  UserPasswordHasherInterface $passwordHasher,
                                  EntityManagerInterface      $entityManager): Response
    {
        $user = $userRepository->findOneBy(["resetToken" => $token]);
        $form = $this->createForm(ResetPasswordType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if ($user) {
                $user->setResetToken('');// on efface le token
                // nouveau mot de passe
                $user->setPassword(
                    $passwordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                    )
                );
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirectToRoute('app.login');
            }
        }
        // on va sur la page de changementdu mot de passe
        return $this->render('security/resetpassword.html.twig',
            [
                'menu' => $this->loadMenu("data/menu.json"),
                'form' => $form->createView(),
            ]
        );
    }
}
