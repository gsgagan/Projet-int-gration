<?php

namespace App\Entity;

use ApiPlatform\\Metadata\\ApiFilter;
use ApiPlatform\\Metadata\\ApiResource;
use ApiPlatform\\Doctrine\\Orm\\Filter\\SearchFilter;
use App\\Repository\\ShowRepository;
use Doctrine\\Common\\Collections\\ArrayCollection;
use Doctrine\\Common\\Collections\\Collection;
use Doctrine\\ORM\\Mapping as ORM;
use Symfony\\Component\\Serializer\\Annotation\\Groups;
use App\\Entity\\Representation;
use App\\Entity\\Review;
use App\\Entity\\ArtisteTypeShow;
use App\\Entity\\Location;

#[ORM\\Entity(repositoryClass: ShowRepository::class)]
#[ORM\\Table(name: "shows")]
#[ApiResource(
    normalizationContext: ['groups' => ['show:read']],
    denormalizationContext: ['groups' => ['show:write']]
)]
#[ApiFilter(SearchFilter::class, properties: [
    'slug' => 'exact',
    'title' => 'partial',
    'location' => 'exact'
])]
class Show
{
    #[ORM\\Id]
    #[ORM\\GeneratedValue]
    #[ORM\\Column]
    #[Groups(['show:read'])]
    private ?int $id = null;

    #[ORM\\Column(length: 60)]
    #[Groups(['show:read', 'show:write'])]
    private ?string $slug = null;

    #[ORM\\Column(length: 255)]
    #[Groups(['show:read', 'show:write'])]
    private ?string $title = null;

    #[ORM\\Column(length: 255, nullable: true)]
    #[Groups(['show:read', 'show:write'])]
    private ?string $poster_url = null;

    #[ORM\\Column(type: "smallint", options: ["unsigned" => true])]
    #[Groups(['show:read', 'show:write'])]
    private ?int $duration = null;

    #[ORM\\Column(type: "integer")]
    #[Groups(['show:read', 'show:write'])]
    private ?int $created_in = null;

    #[ORM\\ManyToOne(inversedBy: "shows")]
    #[ORM\\JoinColumn(name: "location_id", referencedColumnName: "id")]
    #[Groups(['show:read', 'show:write'])]
    private ?Location $location = null;

    #[ORM\\Column(type: "boolean")]
    #[Groups(['show:read', 'show:write'])]
    private ?bool $bookable = null;

    #[ORM\\OneToMany(mappedBy: "show", targetEntity: Representation::class)]
    #[Groups(['show:read'])]
    private Collection $representations;

    #[ORM\\OneToMany(mappedBy: "show", targetEntity: Review::class)]
    #[Groups(['show:read'])]
    private Collection $reviews;

    #[ORM\\OneToMany(mappedBy: "show", targetEntity: ArtisteTypeShow::class)]
    #[Groups(['show:read'])]
    private Collection $artisteTypeShows;

    public function __construct()
    {
        $this->representations = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->artisteTypeShows = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getSlug(): ?string { return $this->slug; }
    public function setSlug(string $slug): static { $this->slug = $slug; return $this; }

    public function getTitle(): ?string { return $this->title; }
    public function setTitle(string $title): static { $this->title = $title; return $this; }

    public function getPosterUrl(): ?string { return $this->poster_url; }
    public function setPosterUrl(?string $poster_url): static { $this->poster_url = $poster_url; return $this; }

    public function getDuration(): ?int { return $this->duration; }
    public function setDuration(int $duration): static { $this->duration = $duration; return $this; }

    public function getCreatedIn(): ?int { return $this->created_in; }
    public function setCreatedIn(int $created_in): static { $this->created_in = $created_in; return $this; }

    public function getLocation(): ?Location { return $this->location; }
    public function setLocation(?Location $location): static { $this->location = $location; return $this; }

    public function isBookable(): ?bool { return $this->bookable; }
    public function setBookable(bool $bookable): static { $this->bookable = $bookable; return $this; }

    public function getRepresentations(): Collection { return $this->representations; }
    public function addRepresentation(Representation $representation): static {
        if (!$this->representations->contains($representation)) {
            $this->representations->add($representation);
            $representation->setShow($this);
        }
        return $this;
    }
    public function removeRepresentation(Representation $representation): static {
        if ($this->representations->removeElement($representation) && $representation->getShow() === $this) {
            $representation->setShow(null);
        }
        return $this;
    }

    public function getReviews(): Collection { return $this->reviews; }
    public function addReview(Review $review): static {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setShow($this);
        }
        return $this;
    }
    public function removeReview(Review $review): static {
        if ($this->reviews->removeElement($review) && $review->getShow() === $this) {
            $review->setShow(null);
        }
        return $this;
    }

    public function getArtisteTypeShows(): Collection { return $this->artisteTypeShows; }
    public function addArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): static {
        if (!$this->artisteTypeShows->contains($artisteTypeShow)) {
            $this->artisteTypeShows->add($artisteTypeShow);
            $artisteTypeShow->setShow($this);
        }
        return $this;
    }
    public function removeArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): static {
        if ($this->artisteTypeShows->removeElement($artisteTypeShow) && $artisteTypeShow->getShow() === $this) {
            $artisteTypeShow->setShow(null);
        }
        return $this;
    }
}
