<?php

namespace App\Controller;

use App\Repository\PersonnelRepository;
use App\Repository\PlatsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PlatsRepository $repo): Response
    {
        //Renvoie le plat ajouté le plus récemment à la carte
        $recentMeal = $repo->findLatest();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'last_meal' => $recentMeal
        ]);
    }
}
