<?php

namespace App\Entity;

use App\Repository\TagsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $tag = null;

    #[ORM\ManyToOne(inversedBy: 'tags')]
    private ?Shows $showId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;

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
