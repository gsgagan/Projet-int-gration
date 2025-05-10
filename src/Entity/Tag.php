<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $tag = null;

    #[ORM\Column(length: 255)]
    private ?string $relation = null;

    /**
     * @var Collection<int, Shows>
     */
    #[ORM\ManyToMany(targetEntity: Shows::class, inversedBy: 'tag')]
    private Collection $showid;

    public function __construct()
    {
        $this->showid = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Shows>
     */
    public function getShowid(): Collection
    {
        return $this->showid;
    }

    public function addShowid(Shows $showid): static
    {
        if (!$this->showid->contains($showid)) {
            $this->showid->add($showid);
        }

        return $this;
    }

    public function removeShowid(Shows $showid): static
    {
        $this->showid->removeElement($showid);

        return $this;
    }

}
