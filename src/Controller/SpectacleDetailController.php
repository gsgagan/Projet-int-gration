<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ShowsRepository;

final class SpectacleDetailController extends AbstractController
{
    #[Route('/spectacle/{slug}', name: 'app_spectacle_detail')]
    public function index($slug, ShowsRepository $showsRepository): Response
    {
        $spectacle = $showsRepository->findOneBySlug($slug);

        return $this->render('spectacle_detail/index.html.twig', [
            'spectacle' => $spectacle,
        ]);
    }
}
