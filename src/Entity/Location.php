<?php

namespace App\Entity;

use ApiPlatform\\Metadata\\ApiResource;
use ApiPlatform\\Metadata\\ApiFilter;
use ApiPlatform\\Doctrine\\Orm\\Filter\\SearchFilter;
use App\\Repository\\LocationRepository;
use Doctrine\\Common\\Collections\\ArrayCollection;
use Doctrine\\Common\\Collections\\Collection;
use Doctrine\\ORM\\Mapping as ORM;
use Symfony\\Component\\Serializer\\Annotation\\Groups;
use App\\Entity\\Show;
use App\\Entity\\Representation;
use App\\Entity\\Localities;

#[ORM\\Entity(repositoryClass: LocationRepository::class)]
#[ORM\\Table(name: "location")]
#[ApiResource(
    normalizationContext: ['groups' => ['location:read']],
    denormalizationContext: ['groups' => ['location:write']],
)]
#[ApiFilter(SearchFilter::class, properties: [
    'slug' => 'exact',
    'designation' => 'partial',
    'locality' => 'exact'
])]
class Location
{
    #[Groups(['location:read'])]
    #[ORM\\Id]
    #[ORM\\GeneratedValue]
    #[ORM\\Column]
    private ?int $id = null;

    #[Groups(['location:read', 'location:write'])]
    #[ORM\\Column(length: 60)]
    private ?string $slug = null;

    #[Groups(['location:read', 'location:write'])]
    #[ORM\\Column(length: 60)]
    private ?string $designation = null;

    #[Groups(['location:read', 'location:write'])]
    #[ORM\\Column(length: 255)]
    private ?string $address = null;

    #[Groups(['location:read', 'location:write'])]
    #[ORM\\ManyToOne(inversedBy: "locations")]
    #[ORM\\JoinColumn(name: "locality_id", referencedColumnName: "id")]
    private ?Localities $locality = null;

    #[Groups(['location:read', 'location:write'])]
    #[ORM\\Column(length: 255, nullable: true)]
    private ?string $website = null;

    #[Groups(['location:read', 'location:write'])]
    #[ORM\\Column(length: 30, nullable: true)]
    private ?string $phone = null;

    #[ORM\\OneToMany(mappedBy: "location", targetEntity: Show::class)]
    private Collection $shows;

    #[ORM\\OneToMany(mappedBy: "location", targetEntity: Representation::class)]
    private Collection $representations;

    public function __construct()
    {
        $this->shows = new ArrayCollection();
        $this->representations = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getSlug(): ?string { return $this->slug; }
    public function setSlug(string $slug): static { $this->slug = $slug; return $this; }

    public function getDesignation(): ?string { return $this->designation; }
    public function setDesignation(string $designation): static { $this->designation = $designation; return $this; }

    public function getAddress(): ?string { return $this->address; }
    public function setAddress(string $address): static { $this->address = $address; return $this; }

    public function getLocality(): ?Localities { return $this->locality; }
    public function setLocality(?Localities $locality): static { $this->locality = $locality; return $this; }

    public function getWebsite(): ?string { return $this->website; }
    public function setWebsite(?string $website): static { $this->website = $website; return $this; }

    public function getPhone(): ?string { return $this->phone; }
    public function setPhone(?string $phone): static { $this->phone = $phone; return $this; }

    public function getShows(): Collection { return $this->shows; }
    public function addShow(Show $show): static {
        if (!$this->shows->contains($show)) {
            $this->shows->add($show);
            $show->setLocation($this);
        }
        return $this;
    }
    public function removeShow(Show $show): static {
        if ($this->shows->removeElement($show)) {
            if ($show->getLocation() === $this) {
                $show->setLocation(null);
            }
        }
        return $this;
    }

    public function getRepresentations(): Collection { return $this->representations; }
    public function addRepresentation(Representation $representation): static {
        if (!$this->representations->contains($representation)) {
            $this->representations->add($representation);
            $representation->setLocation($this);
        }
        return $this;
    }
    public function removeRepresentation(Representation $representation): static {
        if ($this->representations->removeElement($representation)) {
            if ($representation->getLocation() === $this) {
                $representation->setLocation(null);
            }
        }
        return $this;
    }
}
