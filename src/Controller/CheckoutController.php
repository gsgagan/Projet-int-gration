<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Repository\ShowsRepository;
use App\Service\CartService;
use App\Repository\RepresentationsRepository;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\ORM\EntityManagerInterface;



class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'checkout_index')]
    public function index(CartService $cartService, ShowsRepository $representationsRepo): Response
    {
        // Vérifier si le panier est vide
        if (count($cartService->getCart()) === 0) {
            return $this->redirectToRoute('cart_index');
        }

        return $this->render('checkout/index.html.twig', [
            'stripe_key' => $_ENV["STRIPE_KEY"],
        ]);
    }

    #[Route('/create-session', name: 'create_session')]
    public function createSession(CartService $cartService, RepresentationsRepository $representationsRepo): Response
    {
        Stripe::setApiKey($_ENV["STRIPE_SECRET"]);

        $cartWithData = [];
        foreach ($cartService->getCart() as $id => $quantity) {
            $representation = $representationsRepo->find($id);
            if (!$representation) {
                throw new \Exception("La représentation avec l'id $id est introuvable.");
            }
            $cartWithData[] = [
                'representation' => $representation,
                'quantity' => $quantity
            ];
        }

        $line_items = [];
        foreach ($cartWithData as $item) {
            // On récupère l'objet show via la représentation
            $show = $item['representation']->getShowshowId();
            $schedule = $item['representation']->getSchedule(); // Supposons qu'il s'agit d'un objet DateTime
            $line_items[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $show->getTitle() . ' - ' . $schedule->format('d/m/Y H:i'),
                    ],
                    // Ici on appelle getPrice() de l'entité Representations
                    'unit_amount' => $item['representation']->getPrice() * 100, // En centimes
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => $this->generateUrl('checkout_success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('checkout_cancel', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);

        return $this->json(['id' => $checkout_session->id]);
    }


    #[Route('/success', name: 'checkout_success')]
    public function success(CartService $cartService, EntityManagerInterface $em): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
        if (!$user) {
            throw new AccessDeniedException("Vous devez être connecté pour effectuer une réservation.");
        }

        // Créer une nouvelle réservation et renseigner les informations essentielles
        $reservation = new Reservations();
        $reservation->setUserId($user);
        $reservation->setBookingDate(new \DateTime());
        $reservation->setStatus('paid'); // ou utilisez un autre statut adapté à votre logique métier

        // Persister la réservation en base
        $em->persist($reservation);
        $em->flush();

        // Vider le panier
        $cartService->clear();

        // Rediriger ou afficher la vue de succès avec éventuellement l'objet réservation
        return $this->render('checkout/success.html.twig', [
            'reservation' => $reservation,
        ]);
    }


    #[Route('/cancel', name: 'checkout_cancel')]
    public function cancel(): Response
    {
        return $this->render('checkout/cancel.html.twig');
    }
}
