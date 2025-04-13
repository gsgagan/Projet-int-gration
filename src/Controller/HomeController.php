<?php

namespace App\Controller;

use App\Repository\ShowsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ShowsRepository $showsRepository): Response
    {
        $shows = $showsRepository->findAll();
        $latestShows = $showsRepository->findBy([], ['id' => 'DESC'], 5);

        return $this->render('home/index.html.twig', [
            'latest_shows' => $latestShows,
            'shows' => $shows,
        ]);
    }
}
