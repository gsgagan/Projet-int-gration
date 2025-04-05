<?php

namespace App\Entity;

use App\Repository\LocalitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Location;

#[ORM\Entity(repositoryClass: LocalitiesRepository::class)]
#[ORM\Table(name: "localities")]
class Locality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $postal_code = null;

    #[ORM\Column(length: 60)]
    private ?string $locality = null;

    #[ORM\OneToMany(mappedBy: "locality", targetEntity: Location::class)]
    private Collection $location;

    public function __construct()
    {
        $this->location = new ArrayCollection();    
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): static
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(string $locality): static
    {
        $this->locality = $locality;
        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocation(): Collection
    {
        return $this->location;
    }

    public function addLocation(Location $location): static
    {
        if (!$this->location->contains($location)) {
            $this->location->add($location);
            $location->setLocality($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): static
    {
        if ($this->location->removeElement($location)) {
            if ($location->getLocality() === $this) {
                $location->setLocality(null);
            }
        }

        return $this;
    }
}