<?php

namespace App\Controller;

use App\Helper\NumToSeason;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{

    public function __construct(
        private NumToSeason $numToSeason,
        private HttpClientInterface $httpClient,
    )
    {
    }

    /**
     * @Route("/home", name="home")
     */
    public function index()
    {


        return $this->render('/base.html.twig', [
            'date' => $currentWeek,
            'seasonName' => $this->numToSeason->getLabels()[$res],
            'fact' => $fact
        ]);
    }

}