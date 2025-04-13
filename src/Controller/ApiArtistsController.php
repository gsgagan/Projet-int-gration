<?php

namespace App\Controller;

use App\Entity\ArtisteType;
use App\Repository\ArtistsRepository;
use App\Repository\ShowsRepository;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ApiArtistsController extends AbstractController
{
    /**
     * Récupère la liste de tous les artistes
     */
    #[Route('/api/artists', name: 'api_artist_list', methods: ['GET'])]
    public function list(ArtistsRepository $artistsRepository, SerializerInterface $serializer): JsonResponse
    {
        // Récupère tous les artistes
        $artists = $artistsRepository->findAll();

        // Crée le contexte de sérialisation pour le groupe "artists"
        $context = SerializationContext::create();
        $context->setGroups(['artists']);

        // Sérialise la liste des artistes en JSON
        $json = $serializer->serialize($artists, 'json', $context);

        // Retourne la réponse JSON
        return new JsonResponse($json, Response::HTTP_OK, [], true);
    }

    /**
     * Récupère les détails d'un artiste par son ID
     */
    #[Route('/api/artist/{id}', name: 'api_artist_detail', methods: ['GET'])]
    public function detail(int $id, ArtistsRepository $artistsRepository, SerializerInterface $serializer): JsonResponse
    {
        // Récupère l'artiste correspondant à l'id
        $artist = $artistsRepository->find($id);

        if (!$artist) {
            return new JsonResponse(['error' => 'Artist not found'], Response::HTTP_NOT_FOUND);
        }

        // Crée le contexte de sérialisation avec le groupe "artist"
        $context = SerializationContext::create();
        $context->setGroups(['artist']);

        // Sérialise l'entité Artist en JSON
        $json = $serializer->serialize($artist, 'json', $context);

        return new JsonResponse($json, Response::HTTP_OK, [], true);
    }

    /**
     * Récupère les spectacles liés à un artiste
     */
    #[Route('/api/artist/{id}/shows', name: 'api_artist_shows', methods: ['GET'])]
    public function getShows(int $id, ArtistsRepository $artistsRepository, ShowsRepository $showsRepository, SerializerInterface $serializer): JsonResponse
    {
        // Récupère l'artiste
        $artist = $artistsRepository->find($id);

        if (!$artist) {
            return new JsonResponse(['error' => 'Artist not found'], Response::HTTP_NOT_FOUND);
        }

        // Récupère les ArtisteType liés à cet artiste
        $artisteTypes = $artist->getArtisteTypes();

        // Récupère tous les spectacles associés à l'artiste
        $shows = [];
        foreach ($artisteTypes as $artisteType) {
            // Pour chaque ArtisteType, récupère les ArtisteTypeShow
            foreach ($artisteType->getArtisteTypeShows() as $artisteTypeShow) {
                // Récupère le spectacle associé
                $show = $artisteTypeShow->getShowId();
                if ($show && !in_array($show, $shows, true)) {
                    $shows[] = $show;
                }
            }
        }

        // Crée le contexte de sérialisation en définissant le groupe "shows"
        $context = SerializationContext::create();
        $context->setGroups(['shows']);

        // Sérialise la liste des spectacles en JSON
        $json = $serializer->serialize($shows, 'json', $context);

        return new JsonResponse($json, Response::HTTP_OK, [], true);
    }

    /**
     * Récupère les types d'artiste (rôles) d'un artiste
     */
    #[Route('/api/artist/{id}/types', name: 'api_artist_types', methods: ['GET'])]
    public function getTypes(int $id, ArtistsRepository $artistsRepository, SerializerInterface $serializer): JsonResponse
    {
        // Récupère l'artiste
        $artist = $artistsRepository->find($id);

        if (!$artist) {
            return new JsonResponse(['error' => 'Artist not found'], Response::HTTP_NOT_FOUND);
        }

        // Récupère les types d'artiste
        $artisteTypes = $artist->getArtisteTypes();

        // Crée un tableau de types (rôles)
        $types = [];
        foreach ($artisteTypes as $artisteType) {
            if ($artisteType->getTypeId()) {
                $types[] = $artisteType->getTypeId();
            }
        }

        // Sérialise la liste des types en JSON
        $context = SerializationContext::create();
        $context->setGroups(['type']);
        $json = $serializer->serialize($types, 'json', $context);

        return new JsonResponse($json, Response::HTTP_OK, [], true);
    }
}