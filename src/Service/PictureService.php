<?php

namespace App\Service;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RequestStack;

class PictureService
{
    private $params;
    private $requestStack;

    public function __construct(ParameterBagInterface $params, RequestStack $requestStack)
    {
        $this->params = $params;
        $this->requestStack = $requestStack;
    }
    // Ajout des images sur le serveur

    /**
     * @throws Exception
     */
    public function add(UploadedFile $picture, ?string $folder = "", ?int $width = 250, ?int $height = 250)
    {

        $fichier = $picture->getClientOriginalName();
        $infos = getimagesize($picture);
        if ($infos === false) {
            throw new Exception("Format incorrect");
        }
        // détecte le type mime de l'image
        switch ($infos['mime']) {
            case  'image/jpg':
            case  'image/jpeg':
                $picture_source = imagecreatefromjpeg($picture);
                break;
            case 'image/png':
                $picture_source = imagecreatefrompng($picture);
                break;
            case 'image/webp':
                $picture_source = imagecreatefromwebp($picture);
                break;
            default:
                throw new Exception("Format incorrect");

        }
        // format de l'image
        $imageWidth = $infos['0'];
        $imageHeight = $infos['1'];
        //on vérifie l'orientation
        switch ($imageWidth <=> $imageHeight) {
            case -1:// portrait
                $squareSize = $imageWidth;
                $src_x = 0;
                $src_y = ($imageHeight - $squareSize) / 2;
                break;
            case 0 :// carré
                $squareSize = $imageWidth;
                $src_x = 0;
                $src_y = 0;
                break;
            case 1:// paysage
                $squareSize = $imageHeight;
                $src_x = ($imageWidth - $squareSize) / 2;
                $src_y = 0;
                break;
        }
        // creation de l'image miniature
        $dest_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($dest_image, $picture_source, 0, 0, $src_x, $src_y, $width, $height, $squareSize, $squareSize);
        // création des chemins pour les ressources images
        $path = $this->params->get('images_directory') . $folder;
        $path_mini = $path . "/mini/";
        // on vérifie si le répertoire existe
        // sinon on le créé
        if (!file_exists($path_mini)) {
            mkdir($path_mini, 0755, true); //on donne les droits et de manière recursive on créer le répertoire
        }
        // on fait l'image miniature au format webp
        imagewebp($dest_image, $path_mini . "mini-" . $fichier);
        // on copie l'image d'origine dans son répertoire
        $picture->move($path . "/", $fichier);
        return $fichier;
    }
    // suppression des images sur le serveur
    public function delete(UploadedFile $picture, ?string $folder = "", ?int $width = 250, ?int $height = 250): bool
    {
        $success = false;
        $fichier = $picture->getClientOriginalName();
        $path = $this->params->get('images_directory') . $folder;
        $mini = $path . "/mini" . $fichier;
        $orignal = $path . "/" . $fichier;
        if (!file_exists($mini)) {
            unlink($mini); //on supprime la miniature du répertoire
            $success = true;
        }
        if (!file_exists($orignal)) {
            unlink($orignal); //on supprime le fichier du répertoire
            $success = true;
        }
        return $success;
    }

    // lecture des répertoires
    public function scandir($directory): array
    {
        $baseUrl = $this->getBaseUrl() . "/";
        $filePath = $this->params->get('kernel.project_dir') . "\\public\\" . $directory;

        // Lecture des fichiers dans le répertoire
        $files = scandir($filePath);

        // Initialisation d'un tableau pour stocker les informations sur les fichiers images
        $imageInfo = [];
        // Parcours des fichiers
        foreach ($files as $file) {
            // On vérifie que le fichier est une image (en fonction de l'extension)
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), array('jpg', 'jpeg', 'png', 'webp'))) {
                $imagePath = $filePath . '/' . $file;
                // Obtention des informations sur le fichier
                $fileInfo = array(
                    'name' => $file,
                    'image' => $baseUrl . $directory . "/" . $file,
                    'path' => $imagePath,
                    'size' => filesize($imagePath),  // Taille en octets
                    'mime' => mime_content_type($imagePath),  // Type MIME
                );
                // Ajout des informations à notre tableau
                $imageInfo[] = $fileInfo;
            }
        }
        return $imageInfo;
    }

    public function getBaseUrl(): ?string
    {
        $request = $this->requestStack->getCurrentRequest();
        return $request?->getSchemeAndHttpHost();
    }

}