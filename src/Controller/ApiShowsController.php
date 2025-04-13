<?php

namespace App\Controller;

use App\Repository\ShowsRepository;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class ApiShowsController extends AbstractController
{
    #[Route('/api/shows', name: 'api_show_list', methods: ['GET'])]
    public function list(ShowsRepository $showsRepository, SerializerInterface $serializer): JsonResponse
    {
        // Récupère tous les spectacles
        $shows = $showsRepository->findAll();

        // Sérialise la liste des spectacles en JSON sans groupe spécifique pour l'instant
        $json = $serializer->serialize($shows, 'json');

        // Retourne la réponse JSON
        return new JsonResponse($json, 200, [], true);
    }

    #[Route('/api/show/{id}', name: 'api_show_detail', methods: ['GET'])]
    public function detail(int $id, ShowsRepository $showsRepository, SerializerInterface $serializer): JsonResponse
    {
        // Récupère le spectacle correspondant à l'id
        $show = $showsRepository->find($id);

        if (!$show) {
            return new JsonResponse(['error' => 'Show not found'], 404);
        }

        // Sérialise l'entité Show en JSON
        $json = $serializer->serialize($show, 'json');

        return new JsonResponse($json, 200, [], true);
    }
}