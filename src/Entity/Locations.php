<?php

namespace App\Entity;

use App\Repository\LocationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationsRepository::class)]
class Locations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $slug = null;

    #[ORM\Column(length: 60)]
    private ?string $designation = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $website = null;

    #[ORM\Column(length: 30)]
    private ?string $phone = null;

    /**
     * @var Collection<int, Shows>
     */
    #[ORM\OneToMany(targetEntity: Shows::class, mappedBy: 'locationId')]
    private Collection $shows;

    /**
     * @var Collection<int, Representations>
     */
    #[ORM\OneToMany(targetEntity: Representations::class, mappedBy: 'locationId')]
    private Collection $representations;

    #[ORM\ManyToOne(inversedBy: 'locations')]
    private ?Localities $localityId = null;

    public function __construct()
    {
        $this->shows = new ArrayCollection();
        $this->representations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, Shows>
     */
    public function getShows(): Collection
    {
        return $this->shows;
    }

    public function addShow(Shows $show): static
    {
        if (!$this->shows->contains($show)) {
            $this->shows->add($show);
            $show->setLocationId($this);
        }

        return $this;
    }

    public function removeShow(Shows $show): static
    {
        if ($this->shows->removeElement($show)) {
            // set the owning side to null (unless already changed)
            if ($show->getLocationId() === $this) {
                $show->setLocationId(null);
            }
        }

        return $this;
    }
    public function __toString(): string
{
    return $this->name ?? 'Lieu sans nom';
}

    /**
     * @return Collection<int, Representations>
     */
    public function getRepresentations(): Collection
    {
        return $this->representations;
    }

    public function addRepresentation(Representations $representation): static
    {
        if (!$this->representations->contains($representation)) {
            $this->representations->add($representation);
            $representation->setLocationId($this);
        }

        return $this;
    }

    public function removeRepresentation(Representations $representation): static
    {
        if ($this->representations->removeElement($representation)) {
            // set the owning side to null (unless already changed)
            if ($representation->getLocationId() === $this) {
                $representation->setLocationId(null);
            }
        }

        return $this;
    }

    public function getLocalityId(): ?Localities
    {
        return $this->localityId;
    }

    public function setLocalityId(?Localities $localityId): static
    {
        $this->localityId = $localityId;

        return $this;
    }
}
