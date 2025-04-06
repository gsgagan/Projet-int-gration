<?php

namespace App\Entity;

use App\Repository\ShowsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShowsRepository::class)]
class Shows
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $posterUrl = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column]
    private ?int $createdIn = null;

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
        return $this->posterUrl;
    }

    public function setPosterUrl(string $posterUrl): static
    {
        $this->posterUrl = $posterUrl;

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
        return $this->createdIn;
    }

    public function setCreatedIn(int $createdIn): static
    {
        $this->createdIn = $createdIn;

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
