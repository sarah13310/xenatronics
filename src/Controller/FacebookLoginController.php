<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FacebookLoginController extends AbstractController
{
//    private $clientRegistry;
//    private $security;
//
//    public function __construct(ClientRegistry $clientRegistry, Security $security)
//    {
//        $this->clientRegistry = $clientRegistry;
//        $this->security = $security;
//    }

    #[Route(path: '/facebook/login', name: 'facebook.login')]
    public function redirectToProvider(ClientRegistry $clientRegistry): RedirectResponse
    {
        return $clientRegistry
            ->getClient('facebook')
            ->redirect(['public_profile'], ['email']);
    }

    #[Route(path: '/facebook/check', name: 'facebook.check')]
    public function connectCheck(Request $request)
    {

    }
}
