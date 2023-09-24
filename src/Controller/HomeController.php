<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{


    private function loadmenu($file){
        $people_json = file_get_contents($file);
        $tab_json = json_decode($people_json, false);
        return $tab_json;
    }

    #[Route('/', name: 'app.home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'menu' => $this->loadmenu("data/menu.json"),
        ]);
    }

    #[Route('/portfolio', name: 'portfolio')]
    public function portfolio(): Response
    {
        return $this->render('home/portfolio.html.twig', [
            'controller_name' => 'HomeController',
            'menu' => $this->loadmenu("data/menu.json"),
        ]);
    }
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'menu' => $this->loadmenu("data/menu.json"),

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
}
