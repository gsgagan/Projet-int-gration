<?php

namespace App\Entity;

use App\Repository\TypesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypesRepository::class)]
class Types
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $type = null;

    /**
     * @var Collection<int, ArtisteType>
     */
    #[ORM\OneToMany(targetEntity: ArtisteType::class, mappedBy: 'typeId')]
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
            $artisteType->setTypeId($this);
        }

        return $this;
    }

    public function removeArtisteType(ArtisteType $artisteType): static
    {
        if ($this->artisteTypes->removeElement($artisteType)) {
            // set the owning side to null (unless already changed)
            if ($artisteType->getTypeId() === $this) {
                $artisteType->setTypeId(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->type ?? 'Pas de type';
    }

}
