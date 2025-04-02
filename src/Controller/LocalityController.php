<?php

namespace App\Controller;

use App\Repository\LocalitiesRepository; // On conserve le repository existant
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/locality')]
class LocalityController extends AbstractController
{
    #[Route('/', name: 'app_locality_index', methods: ['GET'])]
    public function index(LocalitiesRepository $localitiesRepository): Response
    {
        // Récupère toutes les localités en base de données
        $localities = $localitiesRepository->findAll();

        // Passe la variable au template
        return $this->render('locality/index.html.twig', [
            'localities' => $localities,
        ]);
    }
    
    #[Route('/{id}', name: 'app_locality_show', methods: ['GET'])]
    public function show(int $id, LocalitiesRepository $localitiesRepository): Response
    {
        $locality = $localitiesRepository->find($id);

        if (!$locality) {
            throw $this->createNotFoundException("La localité demandée n'existe pas.");
        }

        return $this->render('locality/show.html.twig', [
            'locality' => $locality,
        ]);
    }
}
