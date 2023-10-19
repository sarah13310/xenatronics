<?php

namespace App\Controller;

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
use Symfony\Component\Security\Core\Security;

class FolioController extends AbstractController
{
    private $user;

    public function __construct(private Util $util, private Security $security)
    {
        $this->menu = $util->createMenu();
        $this->user = $this->security->getUser();
    }

    #[Route('/folio/add', name: 'folio.add')]
    public function folio_add(Request $request, EntityManagerInterface $em, PictureService $ps): Response
    {
        $this->menu = $this->util->createMenu($this->user);
        $folio = new Folio();
        $form = $this->createForm(FolioType::class, $folio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('icon')->getData();
            $folio->setIcon("/assets/images/" . $image->getClientOriginalName());
            $em->persist($folio);
            $em->flush();
            $this->addFlash('success', "projet ajouté avec succès");
            return $this->redirectToRoute("folio.dashboard");
        }

        return $this->render('folio/add.html.twig', [
            'menu' => $this->menu,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/folio/edit/{id}', name: 'folio.edit')]
    public function folio_edit(string $id, FolioRepository $repo): Response
    {
        $this->menu = $this->util->createMenu($this->user);
        $folio = $repo->findOneBy(['id' => $id]);
        if ($folio == null) {
            $folio = new Folio();
        }
        $form = $this->createForm(FolioType::class, $folio);

        return $this->render('folio/edit.html.twig', [
            'menu' => $this->menu,
            'form' => $form->createView(),
            'folio' => $folio,
        ]);
    }

    #[Route('/folio/delete/{id}', name: 'folio.delete')]
    public function folio_delete(string $id, FolioRepository $repo, EntityManagerInterface $em): Response
    {
        $folio = $repo->findOneBy(['id' => $id]);
        $em->remove($folio);
        $em->flush();
        $this->addFlash('success', 'Le projet a été supprimé avec succès.');
        return $this->redirectToRoute('folio.dashboard');
    }

    #[Route('/folio/dashboard', name: 'folio.dashboard')]
    public function dashboard(FolioRepository $repo, Request $request, PaginatorInterface $paginator): Response
    {
        $this->menu = $this->util->createMenu($this->user);
        $pagination = $paginator->paginate($repo->paginationQuery(), $request->get('page', 1), 8);
        return $this->render('folio/dashboard.html.twig', [
            'action' => '/dashboard',
            'label' => 'succes',
            'pagination' => $pagination,
            'menu' => $this->menu,
        ]);
    }


}
