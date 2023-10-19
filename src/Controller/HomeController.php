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
//    private Security $security;
    private $user;

    public function __construct(private Util $util, private Security $security)
    {
        $this->menu = $util->createMenu();
        $this->user = $this->security->getUser();
//        $this->security = $security;
    }

    #[Route('/', name: 'app.home')]
    public function index(): Response
    {
        //$user = $this->security->getUser();
        $this->menu = $this->util->createMenu($this->user);

        return $this->render('home/index.html.twig', [
            'menu' => $this->menu,
            'user' => $this->user ,
        ]);
    }

    #[Route('/portfolio', name: 'portfolio')]
    public function portfolio(): Response
    {
        //$user = $this->security->getUser();
        $this->menu = $this->util->createMenu($this->user);
        return $this->render('home/portfolio.html.twig', [
            'menu' => $this->menu,
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        //$user = $this->security->getUser();
        $this->menu = $this->util->createMenu($this->user);
        return $this->render('home/about.html.twig', [
            'menu' => $this->menu,
            'action' => '/sendcontact',
        ]);
    }

    #[Route('/sendcontact', name: 'sendcontact')]
    public function sendcontact(): Response
    {
        //$user = $this->security->getUser();
        $this->menu = $this->util->createMenu($this->user);
        return $this->render('home/about.html.twig', [
            'action' => '/sendcontact',
        ]);
    }

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(FolioRepository $repo, Request $request, PaginatorInterface $paginator): Response
    {
        // $user = $this->security->getUser();
        $this->menu = $this->util->createMenu($this->user);
        $pagination = $paginator->paginate($repo->paginationQuery(), $request->get('page', 1), 5);
        return $this->render('home/dashboard.html.twig', [
            'action' => '/dashboard',
            'pagination' => $pagination,
        ]);
    }

}
