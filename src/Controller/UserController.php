<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserTypeCreate;
use App\Repository\UserRepository;
use App\Service\PictureService;
use App\Service\SendMailService;
use App\Service\Util;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class UserController extends AbstractController
{
//    private UserRepository $repo;
//
//    public function __construct(Util $util, UserRepository $repo)
//    {
//        $this->repo = $repo;
//        $this->menu = $util->createMenu();
//    }

    private $user;

    public function __construct(private UserRepository $repo, private Util $util, private Security $security)
    {
        $this->menu = $util->createMenu();
        $this->user = $this->security->getUser();
    }


    #[Route('/user/list', name: 'user.list')]
    public function user_list(Request $request, UserRepository $repo, PaginatorInterface $paginator): Response
    {
        $this->menu = $this->util->createMenu($this->user);

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
        $this->menu = $this->util->createMenu($this->user);

        $rootPath = $this->getParameter('kernel.project_dir');
        $files = $ps->scandir("assets/images/avatars");

        $user = new User();
        $form = $this->createForm(UserTypeCreate::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            // on crypte le mot de passe
            $user->setPassword(
                $userPasswordHasher->hashPassword($user, $form->get('password')->getData())
            );
            // on récupere l'objet File
            $image = $form->get('avatar')->getData();

            if ($image !== null) {
                $filename = $image->getClientOriginalName();

                if (str_contains($filename, "http")) {
                    $user->setAvatar($filename);
                } else {
                    $user->setAvatar("/assets/images/" . $filename);
                }
            } else {
                $user->setAvatar("/assets/images/noimage.jpg");
            }

            $token = $tokenGenerator->generateToken();
            // on donne le compte comme vérifé car créé par l'administrateur
            $user->setResetToken("");
            $user->setIsVerified(true);
            $user->setAccess("M");
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Compte <b>' . $user->getName() . '</b> créé');

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
        $this->menu = $this->util->createMenu($this->user);

        $files = $ps->scandir("assets/images/avatars");

        $user = $this->repo->findOneBy(["id" => $id]);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('avatar')->getData();

            if ($image !== null) {

                $filename = $image->getClientOriginalName();

                if (str_contains($filename, "http")) {
                    $user->setAvatar($filename);
                } else {
                    $user->setAvatar("/assets/images/" . $filename);
                }
            } else {
                $user->setAvatar("/assets/images/noimage.jpg");
            }

            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Compte <b>' . $user->getName() . '</b> modifié');

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
    public function user_delete(int                    $id,
                                UserRepository         $repo,
                                EntityManagerInterface $em): Response
    {

        $user = $this->repo->findOneBy(["id" => $id]);
        if ($user) {
            $this->addFlash('success', 'Compte <b>' . $user->getName() . '</b> effacé');
            $user->setDeletedAt(new \DateTime());
            $em->persist($user);// déclenche preRemove
            $em->flush();
        }
        return $this->redirectToRoute('user.list');
    }
}
