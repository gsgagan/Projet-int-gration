<?php

namespace App\Entity;

use App\Repository\ArtistsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Hateoas\Relation(
 *     "self",
 *     href = @Hateoas\Route(
 *         "api_artist_detail",
 *         parameters = {"id" = "expr(object.getId())"},
 *         absolute = true
 *     )
 * )
 * @Hateoas\Relation(
 *     "shows",
 *     href = @Hateoas\Route(
 *         "api_artist_shows",
 *         parameters = {"id" = "expr(object.getId())"},
 *         absolute = true
 *     )
 * )
 */
#[ORM\Entity(repositoryClass: ArtistsRepository::class)]
class Artists
{
    /**
     * @Serializer\Groups({"artists", "artist", "show"})
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Serializer\Groups(["artists", "artist", "show"])]
    private ?int $id = null;

    /**
     * @Serializer\Groups({"artists", "artist", "show"})
     */
    #[ORM\Column(length: 60)]
    #[Serializer\Groups(["artists", "artist", "show"])]
    private ?string $firstname = null;

    /**
     * @Serializer\Groups({"artists", "artist", "show"})
     */
    #[ORM\Column(length: 60)]
    #[Serializer\Groups(["artists", "artist", "show"])]
    private ?string $lastname = null;

    /**
     * @var Collection<int, ArtisteType>
     * @Serializer\Groups({"artist"})
     */
    #[ORM\OneToMany(targetEntity: ArtisteType::class, mappedBy: 'artistId')]
    #[Serializer\Groups(["artist"])]
    private Collection $artisteTypes;

    public function __construct()
    {
        $this->artisteTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

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
            $artisteType->setArtistId($this);
        }

        return $this;
    }

    public function removeArtisteType(ArtisteType $artisteType): static
    {
        if ($this->artisteTypes->removeElement($artisteType)) {
            // set the owning side to null (unless already changed)
            if ($artisteType->getArtistId() === $this) {
                $artisteType->setArtistId(null);
            }
        }

        return $this;
    }

    /**
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("fullName")
     * @Serializer\Groups({"artists", "artist", "show"})
     */
    #[Serializer\VirtualProperty]
    #[Serializer\SerializedName("fullName")]
    #[Serializer\Groups(["artists", "artist", "show"])]
    public function getFullName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function __toString(): string
    {
        return $this->firstname ?? 'Pas de nom';
    }
}