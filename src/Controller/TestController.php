<?php

namespace App\Controller;

use App\Service\Util;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FolioRepository;
use Knp\Component\Pager\PaginatorInterface;

class TestController extends AbstractController
{
    private Util $util;

    public function __construct(Util $util)
    {
        $this->util = $util;
        $this->menu = $this->util->loadmenu("data/menu.json");
    }
    #[Route('/test', name: 'app_test')]
    public function dashboard(FolioRepository $repo, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination= $paginator->paginate($repo->paginationQuery(), $request->get('page', 1), 5);
        return $this->render('test/index.html.twig', [
            'action' => '/dashboard',
            'pagination' => $pagination,
            'menu' => $this->menu,
        ]);
    }
}
