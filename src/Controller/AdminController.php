<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Folio;
use App\Form\FolioType;
use App\Repository\FolioRepository;
use App\Service\PictureService;
use App\Service\Util;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    private string $menu;

    public function __construct(private readonly Util $util)
    {
        $this->menu = $util->createMenu();
    }

//    #[Route('/admin/folio/add', name: 'admin.folio.add')]
//    public function folio_add(Request $request, EntityManagerInterface $em, PictureService $ps): Response
//    {
//        $this->menu = $this->util->createMenu($this->getUser());
//        $folio = new Folio();
//        $form = $this->createForm(FolioType::class, $folio);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $image = $form->get('icon')->getData();
//
//            $folio->setIcon("/images/" . $image->getClientOriginalName());
//            $em->persist($folio);
//            $em->flush();
//            $this->addFlash('success', "projet ajouté avec succès");
//            return $this->redirectToRoute("admin.dashboard");
//        }
//        return $this->render('admin/add.html.twig', [
//            'menu' => $this->menu,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    #[Route('/admin/folio/edit/{id}', name: 'admin.folio.edit')]
//    public function folio_edit(string $id, FolioRepository $repo): Response
//    {
//        $this->menu = $this->util->createMenu($this->user);
//        $folio = $repo->findOneBy(['id' => $id]);
//        if ($folio == null) {
//            $folio = new Folio();
//        }
//        $form = $this->createForm(FolioType::class, $folio);
//
//        return $this->render('admin/edit.html.twig', [
//            'menu' => $this->menu,
//            'form' => $form->createView(),
//            'folio' => $folio,
//        ]);
//    }
//
//    #[Route('/admin/folio/delete/{id}', name: 'admin.folio.delete')]
//    public function folio_delete(string $id, FolioRepository $repo, EntityManagerInterface $em): Response
//    {
//        $this->menu = $this->util->createMenu($this->user);
//        $folio = $repo->findOneBy(['id' => $id]);
//        $em->remove($folio);
//        $em->flush();
//        $this->addFlash('success', 'Le projet a été supprimé avec succès.');
//        return $this->redirectToRoute('admin.dashboard');
//    }

    #[Route('/admin/dashboard', name: 'admin.dashboard')]
    public function dashboard(FolioRepository $repo, Request $request, PaginatorInterface $paginator): Response
    {
        $this->menu = $this->util->createMenu($this->getUser());
        $pagination = $paginator->paginate($repo->paginationQuery(), $request->get('page', 1), 8);
        return $this->render('admin/dashboard.html.twig', [
            'action' => '/dashboard',
            'label' => 'succes',
            'pagination' => $pagination,
            'menu' => $this->menu,
        ]);
    }


}
