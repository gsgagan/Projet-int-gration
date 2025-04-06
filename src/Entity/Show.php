<?php

namespace App\Entity;

use App\Repository\ShowRepository;
use App\Entity\Review;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShowRepository::class)]
class Show
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

    #[ORM\ManyToOne(inversedBy: 'shows')]
    #[ORM\JoinColumn(name: "location_id", referencedColumnName: "id", nullable: true)]
    private ?Location $location = null;

    #[ORM\OneToMany(targetEntity: Representation::class, mappedBy: 'relatedShow')]
    private Collection $representations;

    #[ORM\OneToMany(mappedBy: 'show', targetEntity: Review::class)]
    private Collection $reviews;

    public function __construct()
    {
        $this->representations = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getSlug(): ?string { return $this->slug; }
    public function setSlug(string $slug): static { $this->slug = $slug; return $this; }

    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): static { $this->title = $title; return $this; }

    public function getPosterUrl(): ?string { return $this->posterUrl; }
    public function setPosterUrl(string $posterUrl): static { $this->posterUrl = $posterUrl; return $this; }

    public function getDuration(): ?int { return $this->duration; }
    public function setDuration(int $duration): static { $this->duration = $duration; return $this; }

    public function getCreatedIn(): ?int { return $this->createdIn; }
    public function setCreatedIn(int $createdIn): static { $this->createdIn = $createdIn; return $this; }

    public function isBookable(): ?bool { return $this->bookable; }
    public function setBookable(bool $bookable): static { $this->bookable = $bookable; return $this; }

    public function getLocation(): ?Location { return $this->location; }
    public function setLocation(?Location $location): static { $this->location = $location; return $this; }

    /**
     * @return Collection<int, Representation>
     */
    public function getRepresentations(): Collection
    {
        return $this->representations;
    }

    public function addRepresentation(Representation $representation): static
    {
        if (!$this->representations->contains($representation)) {
            $this->representations->add($representation);
            $representation->setRelatedShow($this);
        }

        return $this;
    }

    public function removeRepresentation(Representation $representation): static
    {
        if ($this->representations->removeElement($representation)) {
            if ($representation->getRelatedShow() === $this) {
                $representation->setRelatedShow(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setShow($this);
        }

        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            if ($review->getShow() === $this) {
                $review->setShow(null);
            }
        }

        return $this;
    }
}
