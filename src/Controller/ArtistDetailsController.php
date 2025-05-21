<?php

namespace App\Controller;

use App\Entity\Troupe;
use App\Repository\TroupeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ArtisteTypeRepository;
use App\Repository\ArtistsRepository;
use Symfony\Component\HttpFoundation\Request;

final class ArtistDetailsController extends AbstractController
{
    #[Route('/artist/details/{id}', name: 'app_artist_details')]
    public function index($id, Request $request, ArtisteTypeRepository $artisteTypeRepository, ArtistsRepository $artistsRepository, TroupeRepository $troupeRepository, Security $security, EntityManagerInterface $entityManager): Response
    {

        $artist = $artistsRepository->find($id);

        if (!$artist) {
            throw $this->createNotFoundException('Artiste non trouvé');
        }


        $artisteTypes = $artisteTypeRepository->findBy(['artistId' => $artist]);


        $troupeForm = null;
        if ($security->isGranted('ROLE_ADMIN')) {

            //$troupes = $troupeRepository->findAll();

            $form = $this->createFormBuilder($artist)
                ->add('troupe', null, [
                    'class' => Troupe::class,
                    'choice_label' => 'name',
                    'placeholder' => 'Non affilié',
                    'required' => false,
                    'label' => 'Affilier à une troupe',
                    'attr' => ['class' => 'form-control']
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Enregistrer',
                    'attr' => ['class' => 'btn btn-primary mt-3']
                ])
                ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $entityManager->persist($artist);
                $entityManager->flush();

                $this->addFlash('success', 'Affiliation mise à jour avec succès.');


                return $this->redirectToRoute('app_artist_details', ['id' => $id]);
            }

            $troupeForm = $form->createView();
        }

        return $this->render('artist_details/index.html.twig', [
            'artist' => $artist,
            'artisteTypes' => $artisteTypes,
            'troupe_form' => $troupeForm,
        ]);
    }
}
