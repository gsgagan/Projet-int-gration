<?php

namespace App\Controller;

use App\Repository\ArtistsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/artist')]
class ArtistController extends AbstractController
{
    #[Route('/', name: 'app_artist_index', methods: ['GET'])]
    public function index(ArtistsRepository $artistsRepository): Response
    {
        $artists = $artistsRepository->findAll();

        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
        ]);
    }
}
