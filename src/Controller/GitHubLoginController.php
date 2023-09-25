<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GitHubLoginController extends AbstractController
{
    #[Route(path: '/github/login', name: 'github.login')]
    public function login(ClientRegistry $clientRegistry): RedirectResponse
    {
        $client = $clientRegistry->getClient('github');
        return $client->redirect(['read:user', 'user:email']);
    }

    #[Route(path: '/github/check', name: 'github.check')]
    public function check(Request $request, ClientRegistry $clientRegistry):RedirectResponse
    {
        $githubUser = $clientRegistry->getClient('github')->fetchUser();
        return new RedirectResponse($this->generateUrl('app.home'));
    }
}

