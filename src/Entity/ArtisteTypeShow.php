<?php

namespace App\Entity;

use App\Repository\ArtisteTypeShowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteTypeShowRepository::class)]
class ArtisteTypeShow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'artisteTypeShows')]
    private ?ArtisteType $artisteTypeId = null;

    #[ORM\ManyToOne(inversedBy: 'artisteTypeShows')]
    private ?Shows $showId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtisteTypeId(): ?ArtisteType
    {
        return $this->artisteTypeId;
    }

    public function setArtisteTypeId(?ArtisteType $artisteTypeId): static
    {
        $this->artisteTypeId = $artisteTypeId;

        return $this;
    }

    public function getShowId(): ?Shows
    {
        return $this->showId;
    }

    public function setShowId(?Shows $showId): static
    {
        $this->showId = $showId;

        return $this;
    }
}
