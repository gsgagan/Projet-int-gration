<?php

namespace App\Entity;

use App\Repository\ShowsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(length: 255)]
    private ?string $shortDesc = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'shows')]
    private ?Locations $locationId = null;

    /**
     * @var Collection<int, Representations>
     */
    #[ORM\OneToMany(targetEntity: Representations::class, mappedBy: 'showshowId')]
    private Collection $schedule;

    /**
     * @var Collection<int, ArtisteTypeShow>
     */
    #[ORM\OneToMany(targetEntity: ArtisteTypeShow::class, mappedBy: 'showId')]
    private Collection $artisteTypeShows;

    /**
     * @var Collection<int, Reviews>
     */
    #[ORM\OneToMany(targetEntity: Reviews::class, mappedBy: 'showId')]
    private Collection $reviews;

    public function __construct()
    {
        $this->schedule = new ArrayCollection();
        $this->artisteTypeShows = new ArrayCollection();
        $this->reviews = new ArrayCollection();
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

    public function getShortDesc(): ?string
    {
        return $this->shortDesc;
    }

    public function setShortDesc(string $shortDesc): static
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLocationId(): ?Locations
    {
        return $this->locationId;
    }

    public function setLocationId(?Locations $locationId): static
    {
        $this->locationId = $locationId;

        return $this;
    }

    public function __toString(): string
    {
        return $this->title ?? 'Spectacle sans titre';
    }

    /**
     * @return Collection<int, Representations>
     */
    public function getSchedule(): Collection
    {
        return $this->schedule;
    }

    public function addSchedule(Representations $schedule): static
    {
        if (!$this->schedule->contains($schedule)) {
            $this->schedule->add($schedule);
            $schedule->setShowshowId($this);
        }

        return $this;
    }

    public function removeSchedule(Representations $schedule): static
    {
        if ($this->schedule->removeElement($schedule)) {
            // set the owning side to null (unless already changed)
            if ($schedule->getShowshowId() === $this) {
                $schedule->setShowshowId(null);
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
            $artisteTypeShow->setShowId($this);
        }

        return $this;
    }

    public function removeArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): static
    {
        if ($this->artisteTypeShows->removeElement($artisteTypeShow)) {
            // set the owning side to null (unless already changed)
            if ($artisteTypeShow->getShowId() === $this) {
                $artisteTypeShow->setShowId(null);
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
            $review->setShowId($this);
        }

        return $this;
    }

    public function removeReview(Reviews $review): static
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getShowId() === $this) {
                $review->setShowId(null);
            }
        }

        return $this;
    }
}
