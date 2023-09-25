<?php
// src/Controller/GoogleLoginController.php
namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class GoogleLoginController extends AbstractController
{
    #Route("/login/google", name="google.login")
    public function redirectToGoogleProvider(ClientRegistry $clientRegistry): Response
    {
        return $clientRegistry
            ->getClient('google')
            ->redirect();
    }

    #Route("/login/google/check", name="google.check")
    public function connectCheck(Request $request)
    {
        if ($this->getUser()) {
            return $this->redirectRoute('app.home');
        } else {
            return $this->redirectRoute('app.login');
        }
        // The "connectCheck" route is handled automatically.
    }
}
