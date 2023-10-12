<?php

namespace App\Service;
use Symfony\Component\Routing\RouterInterface;

class Util
{
    private RouterInterface $router;
    public function __construct(RouterInterface $router){
        $this->router = $router;
    }
    public function loadMenu($file)
    {
        $people_json = file_get_contents($file);
        $tab_json = json_decode($people_json, false);
        return $tab_json;
    }

    public function addMenuItem(string $name, string $link, string $icon): string
    {
        if (str_contains($link,"www")){
            $url = $link;
        }
        else {
            $url = $this->router->generate($link,[]);
        }

        return "        <li class='nav-item '>
                            <a class=\"nav-link\" href=\"".$url."\"><span class='".$icon."'></span>&nbsp;&nbsp;&nbsp;".$name."</a>
                        </li>\r\n";
    }

    public function addDropMenuItem(string $name, string $link): string
    {
        if (str_contains($link,"www")){
            $url = $link;
        }
        else {
            $url = $this->router->generate($link,[]);
        }

        return "        <a class='dropdown-item' href='".$url."'>".$name."</a>\r\n";
    }

    public function startDropMenu(string $name, string $icon): string
    {
        return "<li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle ".$icon."' data-bs-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='true'>&nbsp;&nbsp;&nbsp;&nbsp;".$name."</a>
                    <div class='dropdown-menu' >\r\n";
    }

    public function endDropMenu(): string
    {
        return "</li>\r\n";
    }


    public function createMenu($type = "admin", $bConnected = False)
    {
        $menu = "";
        $menu_sub = "";
        switch ($type) {
            case 'admin':
                $menu_sub = $this->startDropMenu("Image", "bi bi-image");
                $menu_sub .= $this->addDropMenuItem("Liste", "admin.image");
                $menu_sub .= $this->addDropMenuItem("Gestion", "admin.image");
                $menu_sub .= $this->endDropMenu();
                //
                $menu_sub .= $this->startDropMenu("Folio", "bi bi-journals");
                $menu_sub .= $this->addDropMenuItem("Liste", "portfolio");
                $menu_sub .= $this->addDropMenuItem("Gestion", "admin.dashboard");
                $menu_sub .= $this->endDropMenu();
                break;
            case 'user':
                $menu_sub = $this->startDropMenu("Image", "bi bi-image");
                $menu_sub .= $this->addDropMenuItem("Liste", "admin.image");
                $menu_sub .= $this->addDropMenuItem("Gestion", "admin.image");
                $menu_sub .= $this->endDropMenu();
                //
                $menu_sub .= $this->startDropMenu("Folio", "bi bi-journals");
                $menu_sub .= $this->addDropMenuItem("Liste", "portfolio");
                $menu_sub .= $this->addDropMenuItem("Gestion", "admin.dashboard");
                $menu_sub .= $this->endDropMenu();
                break;
        }
//        if (!$bConnected) {
//            $menu .= $this->addMenuItem("Se connecter", "app.login", "bi bi-box-arrow-in-right");
//        }
        $menu .= $this->addMenuItem("Accueil", "app.home", "bi bi-house");
        $menu .= $this->addMenuItem("GitHub", "http://www.github.com", "bi bi-github");
        $menu .= $menu_sub;
        $menu .= $this->addMenuItem("A propos", "about", "bi bi-question-lg");
        
//        if ($bConnected) {
//            $menu .= $this->addMenuItem("Deconnexion", "app.home", "bi bi-box-arrow-right");
//        }
        return $menu;
    }
}

