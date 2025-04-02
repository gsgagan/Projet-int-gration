<?php

namespace App\Entity;

use App\Repository\RepresentationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationsRepository::class)]
#[ORM\Table(name: "representations")]
class Representations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: "representations")]
    #[ORM\JoinColumn(name: "show_id", referencedColumnName: "id", nullable: false)]
    private ?Shows $show = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $schedule = null;

    #[ORM\ManyToOne(inversedBy: "representations")]
    #[ORM\JoinColumn(name: "location_id", referencedColumnName: "id")]
    private ?Location $location = null;

    #[ORM\OneToMany(mappedBy: "representation", targetEntity: RepresentationReservation::class)]
    private Collection $representationReservations;

    public function __construct()
    {
        $this->representationReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShow(): ?Shows
    {
        return $this->show;
    }

    public function setShow(?Shows $show): static
    {
        $this->show = $show;
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
            $this->representationReservations->add($representationReservation);
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