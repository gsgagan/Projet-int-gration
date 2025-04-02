<?php

namespace App\Entity;

use App\Repository\TypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypesRepository::class)]
#[ORM\Table(name: "types")]
class Types
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $type = null;

    #[ORM\Column(length: 100)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: "type", targetEntity: ArtisteType::class)]
    private Collection $artisteTypes;

    public function __construct()
    {
        $this->artisteTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
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
            $artisteType->setType($this);
        }

        return $this;
    }

    public function removeArtisteType(ArtisteType $artisteType): static
    {
        if ($this->artisteTypes->removeElement($artisteType)) {
            if ($artisteType->getType() === $this) {
                $artisteType->setType(null);
            }
        }

        return $this;
    }
}