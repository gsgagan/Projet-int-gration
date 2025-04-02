<?php

namespace App\Entity;

use App\Repository\RepresentationReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationReservationRepository::class)]
#[ORM\Table(name: "representation_reservation")]
class RepresentationReservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: "representationReservations")]
    #[ORM\JoinColumn(name: "representation_id", referencedColumnName: "id", nullable: false)]
    private ?Representations $representation = null;

    #[ORM\ManyToOne(inversedBy: "representationReservations")]
    #[ORM\JoinColumn(name: "reservation_id", referencedColumnName: "id", nullable: false)]
    private ?Reservations $reservation = null;

    #[ORM\ManyToOne(inversedBy: "representationReservations")]
    #[ORM\JoinColumn(name: "price_id", referencedColumnName: "id", nullable: false)]
    private ?Prices $price = null;

    #[ORM\Column(type: "smallint")]
    private ?int $quantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepresentation(): ?Representations
    {
        return $this->representation;
    }

    public function setRepresentation(?Representations $representation): static
    {
        $this->representation = $representation;
        return $this;
    }

    public function getReservation(): ?Reservations
    {
        return $this->reservation;
    }

    public function setReservation(?Reservations $reservation): static
    {
        $this->reservation = $reservation;
        return $this;
    }

    public function getPrice(): ?Prices
    {
        return $this->price;
    }

    public function setPrice(?Prices $price): static
    {
        $this->price = $price;
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