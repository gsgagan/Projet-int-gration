<?php

namespace App\Entity;

use App\Repository\ArtisteTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteTypeRepository::class)]
#[ORM\Table(name: "artiste_type")]
class ArtisteType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: "artisteTypes")]
    #[ORM\JoinColumn(name: "artist_id", referencedColumnName: "id", nullable: false)]
    private ?Artists $artist = null;

    #[ORM\ManyToOne(inversedBy: "artisteTypes")]
    #[ORM\JoinColumn(name: "type_id", referencedColumnName: "id", nullable: false)]
    private ?Types $type = null;

    #[ORM\OneToMany(mappedBy: "artisteType", targetEntity: ArtisteTypeShow::class)]
    private Collection $artisteTypeShows;

    public function __construct()
    {
        $this->artisteTypeShows = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtist(): ?Artists
    {
        return $this->artist;
    }

    public function setArtist(?Artists $artist): static
    {
        $this->artist = $artist;
        return $this;
    }

    public function getType(): ?Types
    {
        return $this->type;
    }

    public function setType(?Types $type): static
    {
        $this->type = $type;
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
            $artisteTypeShow->setArtisteType($this);
        }

        return $this;
    }

    public function removeArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): static
    {
        if ($this->artisteTypeShows->removeElement($artisteTypeShow)) {
            if ($artisteTypeShow->getArtisteType() === $this) {
                $artisteTypeShow->setArtisteType(null);
            }
        }

        return $this;
    }
}