<?php

namespace App\Entity;

use App\Repository\RepresentationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationsRepository::class)]
class Representations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'schedule')]
    private ?Shows $showshowId = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $schedule = null;

    #[ORM\ManyToOne(inversedBy: 'representations')]
    private ?Locations $locationId = null;

    /**
     * @var Collection<int, RepresentationReservation>
     */
    #[ORM\OneToMany(targetEntity: RepresentationReservation::class, mappedBy: 'representationId')]
    private Collection $representationReservations;

    public function __construct()
    {
        $this->representationReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShowshowId(): ?Shows
    {
        return $this->showshowId;
    }

    public function setShowshowId(?Shows $showshowId): static
    {
        $this->showshowId = $showshowId;

        return $this;
    }

    public function getSchedule(): ?\DateTimeInterface
    {
        return $this->schedule;
    }

    public function setSchedule(\DateTimeInterface $schedule): static
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getLocationId(): ?Locations
    {
        return $this->locationId;
    }

    public function setLocationId(?Locations $locationId): static
    {
        $this->locationId = $locationId;

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
            $representationReservation->setRepresentationId($this);
        }

        return $this;
    }

    public function removeRepresentationReservation(RepresentationReservation $representationReservation): static
    {
        if ($this->representationReservations->removeElement($representationReservation)) {
            // set the owning side to null (unless already changed)
            if ($representationReservation->getRepresentationId() === $this) {
                $representationReservation->setRepresentationId(null);
            }
        }

        return $this;
    }

    public function __toString(): string
{
    // Retourner une représentation textuelle unique de cette représentation
    // Par exemple la date et le spectacle associé
    if ($this->getSchedule() && $this->getShowshowId()) {
        return $this->getShowshowId()->getTitle() . ' - ' . 
               $this->getSchedule()->format('d/m/Y H:i');
    }
    
    // Fallback si les informations ne sont pas disponibles
    return 'Représentation #' . ($this->getId() ?? 'nouvelle');
}
}
