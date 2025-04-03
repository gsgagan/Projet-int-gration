<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CatalogueRepository;
use Symfony\Component\HttpFoundation\Request;

final class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'app_catalogue')]
    public function index(CatalogueRepository $catalogueRepository, Request $request): Response
    {
    $spectacles = $catalogueRepository->findAll();

        return $this->render('catalogue/index.html.twig', [
            'spectacles' => $spectacles,
        ]);
    }
}
