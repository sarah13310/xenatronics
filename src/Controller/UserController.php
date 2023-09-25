<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\Util;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PictureService;

class UserController extends AbstractController
{
    private Util $util;
    private UserRepository $repo;

    public function __construct(Util $util, UserRepository $repo)
    {
        $this->repo = $repo;
        $this->util = $util;
        $this->menu = $this->util->loadmenu("data/menu.json");
    }

    #[Route('/user/list', name: 'user.list')]
    public function user_list(Request $request, UserRepository $repo, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate($repo->paginationQuery(), $request->get('page', 1), 8);
        return $this->render('user/list.html.twig', [
            'action' => '/dashboard',
            'label' => 'succes',
            'pagination' => $pagination,
            'menu' => $this->menu,
        ]);
    }

    #[Route('/user/add', name: 'user.add')]
    public function user_add(Request $request, EntityManagerInterface $em, PictureService $ps): Response
    {
        $carousel = [
            ['name' => "item1", "image" => "/images/avatars/avatar-1.jpg"],
            ['name' => "item2", "image" => "/images/avatars/avatar-2.jpg"],
            ['name' => "item3", "image" => "/images/avatars/avatar-3.jpg"],
            ['name' => "item4", "image" => "/images/avatars/avatar-4.jpg"],
            ['name' => "item5", "image" => "/images/avatars/avatar-5.jpg"],
            ['name' => "item6", "image" => "/images/avatars/avatar-6.jpg"],
            ['name' => "item7", "image" => "/images/avatars/avatar-7.jpg"],
            ['name' => "item8", "image" => "/images/avatars/avatar-8.jpg"],
            ['name' => "item9", "image" => "/images/avatars/avatar-9.jpg"]
        ];

        $rootPath = $this->getParameter('kernel.project_dir');
        //$baseUrl = $request->getSchemeAndHttpHost();
        $files=$ps->scandir("images/avatars");


        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

        }
        return $this->render('user/add.html.twig', [
            'menu' => $this->menu,
            'form' => $form->createView(),
            'carousel' => $files,
        ]);
    }

    #[Route('/user/edit/{id}', name: 'user.edit')]
    public function user_edit(int $id, UserRepository $repo): Response
    {
        $user = $this->repo->findByOne(["id" => $id]);
        return $this->render('user/edit.html.twig', [
            'menu' => $this->menu,
        ]);
    }

    #[Route('/user/delete/{id}', name: 'user.delete')]
    public function user_delete(int $id, UserRepository $repo): Response
    {
        $user = $this->repo->findByOne(["id" => $id]);
        return $this->redirectToRoute('user.list', [

        ]);
    }
}
