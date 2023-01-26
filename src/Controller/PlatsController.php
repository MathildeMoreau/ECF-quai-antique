<?php

namespace App\Controller;

use App\Entity\Plats;
use App\Form\PlatType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatsController extends AbstractController
{
    #[Route('/add-plat', name: 'add_plat')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $plat = new Plats;

        $form = $this->createForm(PlatType::class, $plat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $em->persist($data);
            $em->flush();
        }

        return $this->render('plats/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
