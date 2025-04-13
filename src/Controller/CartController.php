<?php

namespace App\Controller;

use App\Repository\RepresentationsRepository;
use App\Repository\ShowsRepository;
use App\Repository\PricesRepository;
use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart_index')]
    public function index(CartService $cartService, ShowsRepository $showsRepository, RepresentationsRepository $representationsRepository): Response
    {
        $cartWithData = [];
        $total = 0;

        foreach ($cartService->getCart() as $id => $quantity) {
            $show = $showsRepository->find($id);

            if ($show) {
                // Trouver le prix du spectacle (utilise la même logique que dans votre template)
                $price = null;
                foreach ($show->getSchedule() as $representation) {
                    foreach ($representation->getRepresentationReservations() as $reservationRepresentation) {
                        if ($price === null && $reservationRepresentation->getPriceId()) {
                            $price = $reservationRepresentation->getPriceId()->getPrice();
                            break 2;
                        }
                    }
                }

                if ($price === null) {
                    $price = 0; // Si aucun prix trouvé
                }

                $cartWithData[] = [
                    'show' => $show,
                    'quantity' => $quantity,
                    'price' => $price
                ];

                $total += $price * $quantity;
            }
        }

        return $this->render('cart/index.html.twig', [
            'items' => $cartWithData,
            'total' => $total
        ]);
    }

    #[Route('/add/{id}', name: 'add')]
    public function add($id, Request $request, CartService $cartService, ShowsRepository $showsRepository): Response
    {
        // Vérifier que le spectacle existe et est réservable
        $show = $showsRepository->find($id);

        if (!$show || !$show->isBookable()) {
            $this->addFlash('error', 'Ce spectacle n\'est pas disponible à la réservation');
            return $this->redirectToRoute('app_home');
        }

        // Récupérer la quantité du formulaire
        $quantity = (int) $request->request->get('quantity', 1);
        if ($quantity < 1) {
            $quantity = 1;
        }

        // Ajouter au panier
        $cartService->add($id, $quantity);

        $this->addFlash('success', 'Le spectacle a été ajouté à votre panier');

        // Rediriger vers le panier
        return $this->redirectToRoute('cart_index');
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove($id, CartService $cartService): Response
    {
        $cartService->remove($id);

        $this->addFlash('success', 'L\'article a été retiré de votre panier');

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/decrease/{id}', name: 'decrease')]
    public function decrease($id, CartService $cartService): Response
    {
        $cartService->decrease($id);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/clear', name: 'clear')]
    public function clear(CartService $cartService): Response
    {
        $cartService->clear();

        $this->addFlash('success', 'Votre panier a été vidé');

        return $this->redirectToRoute('cart_index');
    }
}