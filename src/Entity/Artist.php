<?php

namespace App\Entity;

use App\Repository\ArtistsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\ArtisteType;

#[ORM\Entity(repositoryClass: ArtistsRepository::class)]
#[ORM\Table(name: "artists")]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $firstname = null;

    #[ORM\Column(length: 60)]
    private ?string $lastname = null;

    #[ORM\OneToMany(mappedBy: "artist", targetEntity: ArtisteType::class)]
    private Collection $artisteTypes;

    public function __construct()
    {
        $this->artisteTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return Collection<int, ArtisteType>
     */
    public function getArtisteTypes(): Collection
    {
        return $this->artisteTypes;
    }

    public function addArtisteType(ArtisteType $artisteType): static
    {
        if (!$this->artisteTypes->contains($artisteType)) {
            $this->artisteTypes->add($artisteType);
            $artisteType->setArtist($this);
        }
        return $this;
    }

    public function removeArtisteType(ArtisteType $artisteType): static
    {
        if ($this->artisteTypes->removeElement($artisteType)) {
            if ($artisteType->getArtist() === $this) {
                $artisteType->setArtist(null);
            }
        }
        return $this;
    }
}
