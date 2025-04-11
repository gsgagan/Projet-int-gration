<?php

namespace App\Entity;

use App\Repository\PricesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PricesRepository::class)]
class Prices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    /**
     * @var Collection<int, RepresentationReservation>
     */
    #[ORM\OneToMany(targetEntity: RepresentationReservation::class, mappedBy: 'priceId')]
    private Collection $representationReservations;

    public function __construct()
    {
        $this->representationReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

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
            $this->representationReservations->add($representationReservation);
            $representationReservation->setPriceId($this);
        }

        return $this;
    }

    public function removeRepresentationReservation(RepresentationReservation $representationReservation): static
    {
        if ($this->representationReservations->removeElement($representationReservation)) {
            // set the owning side to null (unless already changed)
            if ($representationReservation->getPriceId() === $this) {
                $representationReservation->setPriceId(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->price ?? 'Pas de prix';
    }
}
