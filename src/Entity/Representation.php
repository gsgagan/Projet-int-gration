<?php

namespace App\Entity;

use App\Repository\RepresentationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationRepository::class)]
class Representation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $schedule = null;

    #[ORM\ManyToOne(inversedBy: 'representations')]
    #[ORM\JoinColumn(name: "show_id", referencedColumnName: "id", nullable: true)]
    private ?Show $relatedShow = null;

    #[ORM\ManyToOne(inversedBy: 'representations')]
    #[ORM\JoinColumn(name: "location_id", referencedColumnName: "id", nullable: true)]
    private ?Location $location = null;

    #[ORM\OneToMany(mappedBy: 'representation', targetEntity: RepresentationReservation::class)]
    private Collection $representationReservations;

    public function __construct()
    {
        $this->representationReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRelatedShow(): ?Show
    {
        return $this->relatedShow;
    }

    public function setRelatedShow(?Show $relatedShow): static
    {
        $this->relatedShow = $relatedShow;
        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;
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
            $representationReservation->setRepresentation($this);
        }

        return $this;
    }

    public function removeRepresentationReservation(RepresentationReservation $representationReservation): static
    {
        if ($this->representationReservations->removeElement($representationReservation)) {
            if ($representationReservation->getRepresentation() === $this) {
                $representationReservation->setRepresentation(null);
            }
        }

        return $this;
    }
}
