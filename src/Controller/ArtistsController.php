<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArtistsRepository;

final class ArtistsController extends AbstractController
{
    #[Route('/artists', name: 'app_artists')]
    public function index(ArtistsRepository $artistsrepository , Request $request): Response
    {
        $artistsrepository = $artistsrepository->findAll();
        
        return $this->render('artists/index.html.twig', [
            'artists' => $artistsrepository,
        ]);
    }
}
