<?php

namespace App\Controller;

use App\Repository\LocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/location')]
class LocationController extends AbstractController
{
    #[Route('/', name: 'app_location_index', methods: ['GET'])]
    public function index(LocationRepository $locationRepository): Response
    {
        // Récupère tous les lieux en base de données
        $locations = $locationRepository->findAll();

        // Passe la variable au template
        return $this->render('location/index.html.twig', [
            'locations' => $locations,
        ]);
    }
    
    #[Route('/{id}', name: 'app_location_show', methods: ['GET'])]
    public function show(int $id, LocationRepository $locationRepository): Response
    {
        $location = $locationRepository->find($id);

        if (!$location) {
            throw $this->createNotFoundException("Le lieu demandé n'existe pas.");
        }

        return $this->render('location/show.html.twig', [
            'location' => $location,
        ]);
    }
}
