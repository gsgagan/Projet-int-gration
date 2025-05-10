<?php

namespace App\Entity;

use App\Repository\ShowsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Hateoas\Relation(
 *     "self",
 *     href = @Hateoas\Route(
 *         "api_show_detail",
 *         parameters = {"id" = "expr(object.getId())"},
 *         absolute = true
 *     )
 * )
 * @Hateoas\Relation(
 *     "reservations",
 *     href = @Hateoas\Route(
 *         "api_show_reservations",
 *         parameters = {"id" = "expr(object.getId())"},
 *         absolute = true
 *     )
 * )
 *
 * @ORM\Entity(repositoryClass=ShowsRepository::class)
 */

#[ORM\Entity(repositoryClass: ShowsRepository::class)]
class Shows
{
    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Serializer\Groups(["shows", "show"])]
    private ?int $id = null;

    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Column(length: 30)]
    #[Serializer\Groups(["shows", "show"])]
    private ?string $slug = null;

    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Column(length: 255)]
    #[Serializer\Groups(["shows", "show"])]
    private ?string $title = null;

    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Column(length: 255)]
    #[Serializer\Groups(["shows", "show"])]
    private ?string $posterUrl = null;

    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Column]
    #[Serializer\Groups(["shows", "show"])]
    private ?int $duration = null;

    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Column]
    #[Serializer\Groups(["shows", "show"])]
    private ?int $createdIn = null;

    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Column]
    #[Serializer\Groups(["shows", "show"])]
    private ?bool $bookable = null;

    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Column(length: 255)]
    #[Serializer\Groups(["shows", "show"])]
    private ?string $shortDesc = null;

    /**
     * @Serializer\Groups({"show"})
     */
    #[ORM\Column(type: "text")]
    #[Serializer\Groups(["show"])]
    private ?string $description = null;

    /**
     * @Serializer\Groups({"show"})
     */
    #[ORM\ManyToOne(inversedBy: 'shows')]
    #[Serializer\Groups(["show"])]
    private ?Locations $locationId = null;

    /**
     * @var Collection<int, Representations>
     * @Serializer\Groups({"show"})
     */
    #[ORM\OneToMany(targetEntity: Representations::class, mappedBy: 'showshowId')]
    #[Serializer\Groups(["show"])]
    private Collection $schedule;

    /**
     * @var Collection<int, ArtisteTypeShow>
     * @Serializer\Groups({"show"})
     */
    #[ORM\OneToMany(targetEntity: ArtisteTypeShow::class, mappedBy: 'showId')]
    #[Serializer\Groups(["show"])]
    private Collection $artisteTypeShows;

    /**
     * @var Collection<int, Reviews>
     * @Serializer\Groups({"show"})
     */
    #[ORM\OneToMany(targetEntity: Reviews::class, mappedBy: 'showId')]
    #[Serializer\Groups(["show"])]
    private Collection $reviews;

    /**
     * @Serializer\Groups({"shows", "show"})
     */
    #[ORM\Column]
    #[Serializer\Groups(["shows", "show"])]
    private ?bool $promoted = null;

    /**
     * @var Collection<int, Tags>
     */
    #[ORM\OneToMany(mappedBy: 'showId', targetEntity: Tags::class)]
    private Collection $tags;

    public function __construct()
    {
        $this->schedule = new ArrayCollection();
        $this->artisteTypeShows = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->tags = new ArrayCollection();
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

    public function isPromoted(): ?bool
    {
        return $this->promoted;
    }

    public function setPromoted(bool $promoted): static
    {
        $this->promoted = $promoted;

        return $this;
    }

    /**
     * @return Collection<int, Tags>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tags $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            $tag->setShowId($this);
        }

        return $this;
    }

    public function removeTag(Tags $tag): static
    {
        if ($this->tags->removeElement($tag)) {
            // set the owning side to null (unless already changed)
            if ($tag->getShowId() === $this) {
                $tag->setShowId(null);
            }
        }

        return $this;
    }
}
