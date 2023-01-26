<?php

namespace App\Controller;

use App\Entity\Personnel;
use App\Form\NouvelUtilisateurType;
use App\Repository\PersonnelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PersonnelController extends AbstractController
{
    #[Route('/add-personnel', name: 'app_utilisateur')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $user = new Personnel();

        $form = $this->createForm(NouvelUtilisateurType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $em->persist($data);
            $em->flush();
        }


        return $this->render('utilisateur/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/all-personnel', name: 'all_personnel')]
    public function getPersonnel(PersonnelRepository $repo){

        $users = $repo->findAll();

        dump($users);
        return new Response('<body></body>');
    }

    #[Route('/all-admins', name: 'all_admins')]
    public function getPersonnelAdmins(PersonnelRepository $repo){

        $users = $repo->findByAdmin(true);

        dump($users);
        return new Response('<body></body>');
    }
}
