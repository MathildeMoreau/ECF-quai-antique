<?php

namespace App\Controller;

use App\Repository\PersonnelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(PersonnelRepository $personnelrepo): Response
    {
        $personnels = $personnelrepo->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'all_users' => $personnels
        ]);
    }
}
