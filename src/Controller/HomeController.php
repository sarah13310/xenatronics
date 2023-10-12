<?php

namespace App\Controller;

use App\Service\Util;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FolioRepository;
use Knp\Component\Pager\PaginatorInterface;

class HomeController extends AbstractController
{

    public function __construct(Util $util)
    {
        $this->menu=$util->createMenu();
    }

    #[Route('/', name: 'app.home')]
    public function index(): Response
    {
        //dd($this->util->createMenu());
        return $this->render('home/index.html.twig', [
            'menu' => $this->menu,
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
        $pagination= $paginator->paginate($repo->paginationQuery(), $request->get('page', 1), 5);
        return $this->render('home/dashboard.html.twig', [
            'action' => '/dashboard',
            'pagination' => $pagination,
        ]);
    }

}
