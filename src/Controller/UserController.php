<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserTypeCreate;
use App\Repository\UserRepository;
use App\Service\PictureService;
use App\Service\SecretTokenService;
use App\Service\SendMailService;
use App\Service\Util;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class UserController extends AbstractController
{
    private UserRepository $repo;

    public function __construct(Util $util, UserRepository $repo)
    {
        $this->repo = $repo;
        $this->menu = $util->createMenu();
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
    public function user_add(Request                     $request,
                             EntityManagerInterface      $em,
                             PictureService              $ps,
                             UserPasswordHasherInterface $userPasswordHasher,
                             SendMailService             $mail,
                             TokenGeneratorInterface     $tokenGenerator): Response
    {
        $rootPath = $this->getParameter('kernel.project_dir');
        $files = $ps->scandir("assets/images/avatars");

        $user = new User();
        $form = $this->createForm(UserTypeCreate::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $image = $form->get('avatar')->getData();

            if ($image !== null) {
                $user->setAvatar("/assets/images/" . $image->getClientOriginalName());
            } else {
                $user->setAvatar("/assets/images/noimage.jpg");
            }
            $token = $tokenGenerator->generateToken();
            $user->setResetToken($token);
            $user->setIsVerified(true);
            $user->setAccess("M");
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Compte <b>'.$user->getName(). '</b> créé');

            return $this->redirectToRoute('user.list');
        }
        return $this->render('user/add.html.twig', [
            'menu' => $this->menu,
            'form' => $form->createView(),
            'carousel' => $files,
            'action' => 'add',
        ]);
    }

    #[Route('/user/edit/{id}', name: 'user.edit')]
    public function user_edit(Request                $request,
                              int                    $id,
                              UserRepository         $repo,
                              EntityManagerInterface $em,
                              PictureService         $ps
    ): Response
    {
        $files = $ps->scandir("assets/images/avatars");

        $user = $this->repo->findOneBy(["id" => $id]);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('avatar')->getData();
            if ($image !== null) {
                $user->setAvatar("/assets/images/" . $image->getClientOriginalName());
            } else {
                $user->setAvatar("/assets/images/noimage.jpg");
            }
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("user.list");
        }

        return $this->render('user/edit.html.twig', [
            'menu' => $this->menu,
            'form' => $form->createView(),
            'user' => $user,
            'carousel' => $files,
            'action' => 'edit',
        ]);
    }

    #[Route('/user/delete/{id}', name: 'user.delete')]
    public function user_delete(int $id,
                                UserRepository $repo,
                                EntityManagerInterface $em): Response
    {
        $user = $this->repo->findOneBy(["id" => $id]);
        if ($user) {
            $em->remove($user);
            $em->flush();
        }
        return $this->redirectToRoute('user.list', []);
    }
}
