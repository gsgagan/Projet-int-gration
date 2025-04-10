<?php

namespace App\Entity;

use App\Repository\ArtistsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistsRepository::class)]
class Artists
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $firstname = null;

    #[ORM\Column(length: 60)]
    private ?string $lastname = null;

    /**
     * @var Collection<int, ArtisteType>
     */
    #[ORM\OneToMany(targetEntity: ArtisteType::class, mappedBy: 'artistId')]
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
            $artisteType->setArtistId($this);
        }

        return $this;
    }

    public function removeArtisteType(ArtisteType $artisteType): static
    {
        if ($this->artisteTypes->removeElement($artisteType)) {
            // set the owning side to null (unless already changed)
            if ($artisteType->getArtistId() === $this) {
                $artisteType->setArtistId(null);
            }
        }

        return $this;
    }
}
