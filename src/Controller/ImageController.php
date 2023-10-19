<?php

namespace App\Controller;

use App\Form\ImageType;
use App\Service\PictureService;
use App\Service\Util;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ImageController extends AbstractController
{
    private $user;

    public function __construct(private Util $util, private Security $security)
    {
        $this->menu = $util->createMenu();
        $this->user = $this->security->getUser();
    }

    #[Route('/admin/image', name: 'admin.image')]
    public function index(Request $request, PictureService $ps): Response
    {
        $this->menu = $this->util->createMenu($this->user);

        $form = $this->createForm(ImageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement du fichier...
            /** @var UploadedFile $file */
            $file = $form->get('inputfile')->getData();
            $folder = "folios";
            $ps->add($file, $folder, 300, 300);
        }

        return $this->render('image/index.html.twig', [
            'menu' => $this->menu,
            'form' => $form->createView()
            ]
        );
    }
}
