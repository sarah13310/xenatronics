<?php

namespace App\Controller;

use App\Repository\FolioRepository;
use App\Service\Util;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private string $menu;

    public function __construct(private readonly Util $util)
    {
        $this->menu = $util->createMenu();
    }

    #[Route('/', name: 'app.home')]
    public function index(): Response
    {
        $this->menu = $this->util->createMenu($this->getUser());
        return $this->render('home/index.html.twig', [
            'menu' => $this->menu,
            'user' => $this->getUser() ,
        ]);
    }

    #[Route('/portfolio', name: 'portfolio')]
    public function portfolio(): Response
    {
        $this->menu = $this->util->createMenu($this->getUser());
        return $this->render('home/portfolio.html.twig', [
            'menu' => $this->menu,
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        $this->menu = $this->util->createMenu($this->getUser());

        return $this->render('home/about.html.twig', [
            'menu' => $this->menu,
            'action' => '/sendcontact',

        ]);
    }

    #[Route('/sendcontact', name: 'sendcontact')]
    public function sendcontact(): Response
    {
        $this->menu = $this->util->createMenu($this->getUser());

        return $this->render('home/about.html.twig', [
            'action' => '/sendcontact',
            'menu' => $this->menu,
        ]);
    }

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(FolioRepository $repo, Request $request, PaginatorInterface $paginator): Response
    {
        $this->menu = $this->util->createMenu($this->getUser());

        $pagination = $paginator->paginate($repo->paginationQuery(), $request->get('page', 1), 5);
        return $this->render('home/dashboard.html.twig', [
            'action' => '/dashboard',
            'pagination' => $pagination,
            'menu'=>$this->menu,
        ]);
    }

}
