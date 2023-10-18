<?php

namespace App\Controller;

use App\Repository\FolioRepository;
use App\Service\Util;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class HomeController extends AbstractController
{

    private Security $security;

    public function __construct(private Util $util, Security $security)
    {
        $this->menu = $util->createMenu();
        $this->security = $security;
    }

    #[Route('/', name: 'app.home')]
    public function index(): Response
    {
        $user = $this->security->getUser();
        if ($user)
            $this->menu = $this->util->createMenu($user->getRoles()[0]);
        return $this->render('home/index.html.twig', [
            'menu' => $this->menu,
            'user' => $user,
        ]);
    }

    #[Route('/portfolio', name: 'portfolio')]
    public function portfolio(): Response
    {
        return $this->render('home/portfolio.html.twig', [
            'menu' => $this->menu,
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'menu' => $this->menu,
            'action' => '/sendcontact',
        ]);
    }

    #[Route('/sendcontact', name: 'sendcontact')]
    public function sendcontact(): Response
    {
        return $this->render('home/about.html.twig', [
            'action' => '/sendcontact',
        ]);
    }

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(FolioRepository $repo, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate($repo->paginationQuery(), $request->get('page', 1), 5);
        return $this->render('home/dashboard.html.twig', [
            'action' => '/dashboard',
            'pagination' => $pagination,
        ]);
    }

}
