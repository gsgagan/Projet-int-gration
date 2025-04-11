<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArtisteTypeRepository;
use App\Repository\ArtistsRepository;
use Symfony\Component\HttpFoundation\Request;

final class ArtistDetailsController extends AbstractController
{
    #[Route('/artist/details/{id}', name: 'app_artist_details')]
    public function index($id, ArtisteTypeRepository $artisteTypeRepository, ArtistsRepository $artistsRepository): Response
    {
        // D'abord, récupérer l'artiste par son ID
        $artist = $artistsRepository->find($id);
        
        if (!$artist) {
            throw $this->createNotFoundException('Artiste non trouvé');
        }
        
        // Ensuite, récupérer tous les ArtisteType associés à cet artiste
        $artisteTypes = $artisteTypeRepository->findBy(['artistId' => $artist]);
        
        return $this->render('artist_details/index.html.twig', [
            'artist' => $artist,
            'artisteTypes' => $artisteTypes,
        ]);
    }
}
