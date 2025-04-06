<?php

namespace App\Entity;

use App\Repository\PriceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PriceRepository::class)]
class Price
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'price', targetEntity: RepresentationReservation::class)]
    private Collection $representationReservations;

    public function __construct()
    {
        $this->representationReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Collection<int, RepresentationReservation>
     */
    public function getRepresentationReservations(): Collection
    {
        return $this->representationReservations;
    }

    public function addRepresentationReservation(RepresentationReservation $representationReservation): static
    {
        if (!$this->representationReservations->contains($representationReservation)) {
            $this->representationReservations[] = $representationReservation;
            $representationReservation->setPrice($this);
        }

        return $this;
    }

    public function removeRepresentationReservation(RepresentationReservation $representationReservation): static
    {
        if ($this->representationReservations->removeElement($representationReservation)) {
            if ($representationReservation->getPrice() === $this) {
                $representationReservation->setPrice(null);
            }
        }

        return $this;
    }
}
