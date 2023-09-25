<?php
namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class GoogleLoginController extends AbstractController
{
//    private $clientRegistry;
//    private $security;
//
//    public function __construct(ClientRegistry $clientRegistry, Security $security)
//    {
//        $this->clientRegistry = $clientRegistry;
//        $this->security = $security;
//    }

    #[Route(path: '/google/login', name: 'google.login')]
    public function redirectToGoogleProvider( ClientRegistry $clientRegistry): RedirectResponse
    {
        return $clientRegistry
            ->getClient('google')
            ->redirect();
    }

    #[Route(path: '/google/check', name: 'google.check')]
    public function connectCheck(Request $request)
    {

    }
}
