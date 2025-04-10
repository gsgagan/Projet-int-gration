<?php

namespace App\Entity;

use App\Repository\RepresentationReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationReservationRepository::class)]
class RepresentationReservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'representationReservations')]
    private ?Representations $representationId = null;

    #[ORM\ManyToOne(inversedBy: 'priceId')]
    private ?Reservations $reservationId = null;

    #[ORM\ManyToOne(inversedBy: 'representationReservations')]
    private ?Prices $priceId = null;

    #[ORM\Column]
    private ?int $quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepresentationId(): ?Representations
    {
        return $this->representationId;
    }

    public function setRepresentationId(?Representations $representationId): static
    {
        $this->representationId = $representationId;

        return $this;
    }

    public function getReservationId(): ?Reservations
    {
        return $this->reservationId;
    }

    public function setReservationId(?Reservations $reservationId): static
    {
        $this->reservationId = $reservationId;

        return $this;
    }

    public function getPriceId(): ?Prices
    {
        return $this->priceId;
    }

    public function setPriceId(?Prices $priceId): static
    {
        $this->priceId = $priceId;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }
}
