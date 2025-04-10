<?php

namespace App\Entity;

use App\Repository\ArtisteTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteTypeRepository::class)]
class ArtisteType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'artisteTypes')]
    private ?Artists $artistId = null;

    #[ORM\ManyToOne(inversedBy: 'artisteTypes')]
    private ?Types $typeId = null;

    /**
     * @var Collection<int, ArtisteTypeShow>
     */
    #[ORM\OneToMany(targetEntity: ArtisteTypeShow::class, mappedBy: 'artisteTypeId')]
    private Collection $artisteTypeShows;

    public function __construct()
    {
        $this->artisteTypeShows = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtistId(): ?Artists
    {
        return $this->artistId;
    }

    public function setArtistId(?Artists $artistId): static
    {
        $this->artistId = $artistId;

        return $this;
    }

    public function getTypeId(): ?Types
    {
        return $this->typeId;
    }

    public function setTypeId(?Types $typeId): static
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * @return Collection<int, ArtisteTypeShow>
     */
    public function getArtisteTypeShows(): Collection
    {
        return $this->artisteTypeShows;
    }

    public function addArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): static
    {
        if (!$this->artisteTypeShows->contains($artisteTypeShow)) {
            $this->artisteTypeShows->add($artisteTypeShow);
            $artisteTypeShow->setArtisteTypeId($this);
        }

        return $this;
    }

    public function removeArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): static
    {
        if ($this->artisteTypeShows->removeElement($artisteTypeShow)) {
            // set the owning side to null (unless already changed)
            if ($artisteTypeShow->getArtisteTypeId() === $this) {
                $artisteTypeShow->setArtisteTypeId(null);
            }
        }

        return $this;
    }
}
