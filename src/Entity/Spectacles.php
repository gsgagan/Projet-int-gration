<?php

namespace App\Entity;

use App\Repository\SpectaclesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpectaclesRepository::class)]
class Spectacles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $poster_url = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column]
    private ?int $created_in = null;

    #[ORM\Column]
    private ?bool $bookable = null;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPosterUrl(): ?string
    {
        return $this->poster_url;
    }

    public function setPosterUrl(string $poster_url): static
    {
        $this->poster_url = $poster_url;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getCreatedIn(): ?int
    {
        return $this->created_in;
    }

    public function setCreatedIn(int $created_in): static
    {
        $this->created_in = $created_in;

        return $this;
    }

    public function isBookable(): ?bool
    {
        return $this->bookable;
    }

    public function setBookable(bool $bookable): static
    {
        $this->bookable = $bookable;

        return $this;
    }
}
