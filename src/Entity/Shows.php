<?php

namespace App\Entity;

use App\Repository\ShowsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShowsRepository::class)]
#[ORM\Table(name: "shows")]
class Shows
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $poster_url = null;

    #[ORM\Column(type: "smallint", options: ["unsigned" => true])]
    private ?int $duration = null;

    #[ORM\Column(type: "integer")]
    private ?int $created_in = null;

    #[ORM\ManyToOne(inversedBy: "shows")]
    #[ORM\JoinColumn(name: "location_id", referencedColumnName: "id")]
    private ?Location $location = null;

    #[ORM\Column(type: "boolean")]
    private ?bool $bookable = null;

    #[ORM\OneToMany(mappedBy: "show", targetEntity: Representations::class)]
    private Collection $representations;

    #[ORM\OneToMany(mappedBy: "show", targetEntity: Reviews::class)]
    private Collection $reviews;

    #[ORM\OneToMany(mappedBy: "show", targetEntity: ArtisteTypeShow::class)]
    private Collection $artisteTypeShows;

    public function __construct()
    {
        $this->representations = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->artisteTypeShows = new ArrayCollection();
    }

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

    public function setPosterUrl(?string $poster_url): static
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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;
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

    /**
     * @return Collection<int, Representations>
     */
    public function getRepresentations(): Collection
    {
        return $this->representations;
    }

    public function addRepresentation(Representations $representation): static
    {
        if (!$this->representations->contains($representation)) {
            $this->representations->add($representation);
            $representation->setShow($this);
        }

        return $this;
    }

    public function removeRepresentation(Representations $representation): static
    {
        if ($this->representations->removeElement($representation)) {
            if ($representation->getShow() === $this) {
                $representation->setShow(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reviews>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Reviews $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setShow($this);
        }

        return $this;
    }

    public function removeReview(Reviews $review): static
    {
        if ($this->reviews->removeElement($review)) {
            if ($review->getShow() === $this) {
                $review->setShow(null);
            }
        }

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
            $artisteTypeShow->setShow($this);
        }

        return $this;
    }

    public function removeArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): static
    {
        if ($this->artisteTypeShows->removeElement($artisteTypeShow)) {
            if ($artisteTypeShow->getShow() === $this) {
                $artisteTypeShow->setShow(null);
            }
        }

        return $this;
    }
}