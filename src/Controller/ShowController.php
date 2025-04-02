<?php

namespace App\Controller;

use App\Repository\ShowsRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowController extends AbstractController
{
    #[Route('/show', name: 'app_shows')]
    public function index(ShowRepository $showRepository, UsersRepository $usersRepository): Response
    {
        // Récupérer tous les spectacles
        $show = $showRepository->findAll();

        // Récupérer tous les utilisateurs
        $users = $usersRepository->findAll();

        // Retourner la vue avec les données
        return $this->render('shows/index.html.twig', [
            'shows' => $show,
            'users' => $users,
        ]);
    }
}
