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

class ImageController extends AbstractController
{
    private Util $util;

    public function __construct(Util $util)
    {
        $this->util = $util;
        $this->menu = $this->util->loadmenu("data/menu.json");
    }


    #[Route('/admin/image', name: 'admin.image')]
    public function index(Request $request, PictureService $ps): Response
    {
//        $image=$request->get('inputfile');
        // dd($request);
//        $file = $request->files->get('inputfile');

        $form = $this->createForm(ImageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement du fichier...
            /** @var UploadedFile $file */
            $file = $form->get('inputfile')->getData();
            $folder = "folios";
            $ps->add($file, $folder, 300, 300);

        }

//        if ($request->getMethod() == 'POST') {
//            dd($file);
//            if ($file instanceof UploadedFile) {
//                $folder = "folios";
//                foreach ($image as $picture) {
//                    $ps->add($folder, $picture, 300, 300);
//                }
//            }
//
//        }
        return $this->render('image/index.html.twig', ['menu' => $this->menu,
            'form' => $form->createView(),]);
    }
}
