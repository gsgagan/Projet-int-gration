<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
class Reservations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Users $userId = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $bookingDate = null;

    #[ORM\Column(length: 60)]
    private ?string $status = null;

    /**
     * @var Collection<int, RepresentationReservation>
     */
    #[ORM\OneToMany(targetEntity: RepresentationReservation::class, mappedBy: 'reservationId')]
    private Collection $priceId;

    public function __construct()
    {
        $this->priceId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getBookingDate(): ?\DateTimeInterface
    {
        return $this->bookingDate;
    }

    public function setBookingDate(\DateTimeInterface $bookingDate): static
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, RepresentationReservation>
     */
    public function getPriceId(): Collection
    {
        return $this->priceId;
    }

    public function addPriceId(RepresentationReservation $priceId): static
    {
        if (!$this->priceId->contains($priceId)) {
            $this->priceId->add($priceId);
            $priceId->setReservationId($this);
        }

        return $this;
    }

    public function removePriceId(RepresentationReservation $priceId): static
    {
        if ($this->priceId->removeElement($priceId)) {
            // set the owning side to null (unless already changed)
            if ($priceId->getReservationId() === $this) {
                $priceId->setReservationId(null);
            }
        }

        return $this;
    }
}
