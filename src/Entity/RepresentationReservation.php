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

    #[ORM\Column]
    private ?int $seats = null;

    #[ORM\ManyToOne(inversedBy: 'representationReservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Representation $representation = null;

    #[ORM\ManyToOne(inversedBy: 'representationReservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reservation $reservation = null;

    #[ORM\ManyToOne(inversedBy: 'representationReservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Price $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): static
    {
        $this->seats = $seats;
        return $this;
    }

    public function getRepresentation(): ?Representation
    {
        return $this->representation;
    }

    public function setRepresentation(?Representation $representation): static
    {
        $this->representation = $representation;
        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): static
    {
        $this->reservation = $reservation;
        return $this;
    }

    public function getPrice(): ?Price
    {
        return $this->price;
    }

    public function setPrice(?Price $price): static
    {
        $this->price = $price;
        return $this;
    }
}
