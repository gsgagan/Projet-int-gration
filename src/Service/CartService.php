<?php

namespace App\Service;

use App\Entity\Representations;
use Symfony\Component\HttpFoundation\RequestStack;

class CartService
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    private function getSession()
    {
        return $this->requestStack->getSession();
    }

    public function getCart()
    {
        return $this->getSession()->get('cart', []);
    }

    public function add(int $representationId, int $quantity = 1)
    {
        $cart = $this->getCart();

        if (!empty($cart[$representationId])) {
            $cart[$representationId] += $quantity;
        } else {
            $cart[$representationId] = $quantity;
        }

        $this->getSession()->set('cart', $cart);
    }

    public function remove(int $representationId)
    {
        $cart = $this->getCart();

        if (!empty($cart[$representationId])) {
            unset($cart[$representationId]);
        }

        $this->getSession()->set('cart', $cart);
    }

    public function decrease(int $representationId)
    {
        $cart = $this->getCart();

        if ($cart[$representationId] > 1) {
            $cart[$representationId]--;
        } else {
            unset($cart[$representationId]);
        }

        $this->getSession()->set('cart', $cart);
    }

    public function clear()
    {
        $this->getSession()->remove('cart');
    }
}