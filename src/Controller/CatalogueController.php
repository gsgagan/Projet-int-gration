<?php

namespace App\Controller;

use App\Repository\ShowsRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


final class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'app_catalogue')]
    public function index(Request $request, ShowsRepository $showsRepository): Response
    {
        // Récupérer le paramètre de recherche
        $searchTerm = $request->query->get('q');

        // Si une recherche est effectuée
        if ($searchTerm) {
            // Recherche dans les titres, descriptions, et tags
            $spectacles = $showsRepository->createQueryBuilder('s')
                ->leftJoin('s.tags', 't') // Jointure avec la collection 'tags'
                ->where('s.title LIKE :searchTerm')
                ->orWhere('s.shortDesc LIKE :searchTerm')
                ->orWhere('s.description LIKE :searchTerm')
                ->orWhere('t.tag LIKE :searchTerm') // Recherche dans le champ 'tag' de l'entité Tag
                ->setParameter('searchTerm', '%' . $searchTerm . '%')
                ->distinct(true) // Pour éviter les doublons
                ->orderBy('s.title', 'ASC')
                ->getQuery()
                ->getResult();
        } else {
            // Sans recherche, afficher tous les spectacles
            $spectacles = $showsRepository->findBy([], ['title' => 'ASC']);
        }

        return $this->render('catalogue/index.html.twig', [
            'spectacles' => $spectacles,
            'searchTerm' => $searchTerm
        ]);
    }

    /**
     * Affiche les spectacles qui ne possèdent pas le mot-clé donné en paramètre
     *

     */
    #[Route('/catalogue/without-tag/{tagName}', name: 'app_catalogue_without_tag')]
    public function showsWithoutTag(string $tagName, ShowsRepository $showsRepository, TagRepository $tagRepository): Response
    {
        // Vérifier d'abord si le tag existe
        $tag = $tagRepository->findOneBy(['tag' => $tagName]);

        if (!$tag) {
            // Si le tag n'existe pas, on peut soit rediriger vers la liste complète
            // soit afficher un message d'erreur
            $this->addFlash('warning', 'Le mot-clé "'.$tagName.'" n\'existe pas.');
            return $this->redirectToRoute('app_catalogue');
        }

        // Approche 1 : Utiliser NOT EXISTS - plus propre
        $spectacles = $showsRepository->createQueryBuilder('s')
            ->where('NOT EXISTS (
                SELECT 1 FROM App\Entity\Tag t
                JOIN t.showid shows
                WHERE t.id = :tagId AND shows = s
            )')
            ->setParameter('tagId', $tag->getId())
            ->orderBy('s.title', 'ASC')
            ->getQuery()
            ->getResult();


        return $this->render('catalogue/without_tag.html.twig', [
            'spectacles' => $spectacles,
            'tag' => $tag,
        ]);
    }
}
