<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ShowsRepository;
use Symfony\Component\HttpFoundation\Request;

final class ShowsController extends AbstractController
{
    #[Route('/shows', name: 'app_shows')]
    public function index(ShowsRepository $showsRepositery, Request $request): Response
    {

        $shows = $showsRepositery->findAll();

        return $this->render('shows/index.html.twig', [
            'spectacles' => $shows,
        ]);
    }
}
