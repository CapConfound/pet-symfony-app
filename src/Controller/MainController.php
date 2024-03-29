<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {

    /**
     * @throws \Exception
     */
    #[Route('/', name: 'index')]
    public function index()
    {
        $number = random_int(0, 100);

        $sample = [];
        for($s = 0; $s < 10; $s++) {
            $sample[] = 1;
        }
        print_r($sample);

        return $this->redirectToRoute('home');
    }


}