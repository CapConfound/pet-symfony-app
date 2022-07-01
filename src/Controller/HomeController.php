<?php

namespace App\Controller;

use App\Service\SeasonImporter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(
        private SeasonImporter $seasonImporter
    )
    {
    }

    private function saveCar(): void
    {

    }

    #[Route('/home', name: 'home')]
    public function index()
    {

        $season = $this->seasonImporter->getSeason();

        return $this->render('/base.html.twig', $season);
    }

}