<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\InscriptionFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new Users();

        $form = $this->createForm(InscriptionFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($user);
            $entityManager->flush(); //sauvegarde en bdd

            $this->addFlash(
                'success',
                'Votre demande a été envoyée. Nous reviendrons rapidement vers vous'
            );

            return $this->redirectToRoute('app_home');
        }

        $titre = "Inscription";

        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView(),
            'mon_titre' => $titre,
        ]);
    }
}
