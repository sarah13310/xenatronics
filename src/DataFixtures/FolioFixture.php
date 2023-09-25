<?php

namespace App\DataFixtures;

use App\Entity\Folio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class FolioFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $foliosData = $this->loadDataFromJson();
        foreach ($foliosData as $data) {
            $folio = new Folio();
            $folio->setName($data['name']);
            $folio->setLink($data['link']);
            $folio->setIcon($data['image']);
            $manager->persist($folio);
        }
        $manager->flush();
    }

    private function loadDataFromJson()
    {
        $jsonContent = file_get_contents('public/data/folios.json');
        $foliosData = json_decode($jsonContent, true);
        return $foliosData;
    }
}
