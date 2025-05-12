<?php

namespace App\Controller\Api;

use App\Entity\Rating;
use App\Entity\Shows;
use App\Repository\RatingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RatingController extends AbstractController
{
    #[Route('/api/shows/{id}/rate', name: 'api_show_rate', methods: ['POST'])]
    public function rateShow(
        Shows $show,
        Request $request,
        EntityManagerInterface $entityManager,
        RatingRepository $ratingRepository
    ): Response {
        // Vérifier si l'utilisateur est connecté
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Vous devez être connecté pour noter ce spectacle'], Response::HTTP_UNAUTHORIZED);
        }

        // Récupérer et valider la note
        $data = json_decode($request->getContent(), true);
        $score = $data['score'] ?? null;

        if ($score === null || $score < 1 || $score > 5) {
            return $this->json(['error' => 'La note doit être entre 1 et 5'], Response::HTTP_BAD_REQUEST);
        }

        // Vérifier si l'utilisateur a déjà noté ce spectacle
        $existingRating = $ratingRepository->findOneBy([
            'shows' => $show,
            'user' => $user
        ]);

        if ($existingRating) {
            // Mettre à jour la note existante
            $existingRating->setScore($score);
        } else {
            // Créer une nouvelle note
            $rating = new Rating();
            $rating->setScore($score);
            $rating->setUser($user);
            $rating->setShows($show);
            $rating->setCreatedAt(new \DateTimeImmutable());

            $entityManager->persist($rating);
        }

        $entityManager->flush();

        // Calculer la nouvelle moyenne
        $averageRating = $ratingRepository->createQueryBuilder('r')
            ->select('AVG(r.score)')
            ->where('r.shows = :show')
            ->setParameter('show', $show)
            ->getQuery()
            ->getSingleScalarResult();

        return $this->json([
            'success' => true,
            'averageRating' => round((float) $averageRating, 1),
            'userRating' => $score
        ]);
    }

    #[Route('/api/shows/{id}/ratings', name: 'api_show_ratings', methods: ['GET'])]
    public function getShowRatings(
        Shows $show,
        RatingRepository $ratingRepository
    ): Response {
        // Calculer la moyenne des notes
        $averageRating = $ratingRepository->createQueryBuilder('r')
            ->select('AVG(r.score)')
            ->where('r.shows = :show')
            ->setParameter('show', $show)
            ->getQuery()
            ->getSingleScalarResult();

        // Compter le nombre total de notes
        $totalRatings = $ratingRepository->count(['shows' => $show]);

        // Récupérer la note de l'utilisateur courant (s'il est connecté)
        $userRating = null;
        if ($this->getUser()) {
            $userRatingEntity = $ratingRepository->findOneBy([
                'shows' => $show,
                'user' => $this->getUser()
            ]);

            if ($userRatingEntity) {
                $userRating = $userRatingEntity->getScore();
            }
        }

        return $this->json([
            'averageRating' => round((float) $averageRating, 1),
            'totalRatings' => $totalRatings,
            'userRating' => $userRating
        ]);
    }
}