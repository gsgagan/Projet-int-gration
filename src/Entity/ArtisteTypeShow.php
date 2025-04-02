<?php

namespace App\Entity;

use App\Repository\ArtisteTypeShowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteTypeShowRepository::class)]
#[ORM\Table(name: "artiste_type_show")]
class ArtisteTypeShow
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: "artisteTypeShows")]
    #[ORM\JoinColumn(name: "artiste_type_id", referencedColumnName: "id", nullable: false)]
    private ?ArtisteType $artisteType = null;

    #[ORM\ManyToOne(inversedBy: "artisteTypeShows")]
    #[ORM\JoinColumn(name: "show_id", referencedColumnName: "id", nullable: false)]
    private ?Shows $show = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtisteType(): ?ArtisteType
    {
        return $this->artisteType;
    }

    public function setArtisteType(?ArtisteType $artisteType): static
    {
        $this->artisteType = $artisteType;
        return $this;
    }

    public function getShow(): ?Shows
    {
        return $this->show;
    }

    public function setShow(?Shows $show): static
    {
        $this->show = $show;
        return $this;
    }
}