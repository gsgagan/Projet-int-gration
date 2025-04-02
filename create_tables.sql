// src/Repository/ArtisteTypeRepository.php
namespace App\Repository;

use App\Entity\ArtisteType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArtisteTypeRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, ArtisteType::class);
}
}// src/Repository/ArtisteTypeShowRepository.php
namespace App\Repository;

use App\Entity\ArtisteTypeShow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArtisteTypeShowRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, ArtisteTypeShow::class);
}
}// src/Repository/ArtistsRepository.php
namespace App\Repository;

use App\Entity\Artists;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArtistsRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Artists::class);
}
}// src/Repository/LocalitiesRepository.php
namespace App\Repository;

use App\Entity\Localities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LocalitiesRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Localities::class);
}
}// src/Repository/LocationsRepository.php
namespace App\Repository;

use App\Entity\Locations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LocationsRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Locations::class);
}
}// src/Repository/PricesRepository.php
namespace App\Repository;

use App\Entity\Prices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PricesRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Prices::class);
}
}// src/Repository/RepresentationReservationRepository.php
namespace App\Repository;

use App\Entity\RepresentationReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RepresentationReservationRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, RepresentationReservation::class);
}
}// src/Repository/RepresentationsRepository.php
namespace App\Repository;

use App\Entity\Representations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RepresentationsRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Representations::class);
}
}// src/Repository/ReservationsRepository.php
namespace App\Repository;

use App\Entity\Reservations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReservationsRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Reservations::class);
}
}// src/Repository/ReviewsRepository.php
namespace App\Repository;

use App\Entity\Reviews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReviewsRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Reviews::class);
}
}// src/Repository/RoleUserRepository.php
namespace App\Repository;

use App\Entity\RoleUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RoleUserRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, RoleUser::class);
}
}// src/Repository/RolesRepository.php
namespace App\Repository;

use App\Entity\Roles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RolesRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Roles::class);
}
}// src/Repository/ShowsRepository.php
namespace App\Repository;

use App\Entity\Shows;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ShowsRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Shows::class);
}
}// src/Repository/TypesRepository.php
namespace App\Repository;

use App\Entity\Types;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TypesRepository extends ServiceEntityRepository
{
public function __construct(ManagerRegistry $registry)
{
parent::__construct($registry, Types::class);
}
}// src/Entity/Roles.php
namespace App\Entity;

use App\Repository\RolesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RolesRepository::class)]
#[ORM\Table(name: "roles")]
class Roles
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 30)]
private ?string $role = null;

#[ORM\OneToMany(mappedBy: "role", targetEntity: RoleUser::class)]
private Collection $roleUsers;

public function __construct()
{
$this->roleUsers = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getRole(): ?string
{
return $this->role;
}

public function setRole(string $role): self
{
$this->role = $role;
return $this;
}

/**
* @return Collection<int, RoleUser>
*/
public function getRoleUsers(): Collection
{
return $this->roleUsers;
}

public function addRoleUser(RoleUser $roleUser): self
{
if (!$this->roleUsers->contains($roleUser)) {
$this->roleUsers->add($roleUser);
$roleUser->setRole($this);
}

return $this;
}

public function removeRoleUser(RoleUser $roleUser): self
{
if ($this->roleUsers->removeElement($roleUser)) {
if ($roleUser->getRole() === $this) {
$roleUser->setRole(null);
}
}

return $this;
}
}// src/Entity/RepresentationReservation.php
namespace App\Entity;

use App\Repository\RepresentationReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationReservationRepository::class)]
#[ORM\Table(name: "representation_reservation")]
class RepresentationReservation
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\ManyToOne(inversedBy: "representationReservations")]
#[ORM\JoinColumn(name: "representation_id", referencedColumnName: "id", nullable: false)]
private ?Representations $representation = null;

#[ORM\ManyToOne(inversedBy: "representationReservations")]
#[ORM\JoinColumn(name: "reservation_id", referencedColumnName: "id", nullable: false)]
private ?Reservations $reservation = null;

#[ORM\ManyToOne(inversedBy: "representationReservations")]
#[ORM\JoinColumn(name: "price_id", referencedColumnName: "id", nullable: false)]
private ?Prices $price = null;

#[ORM\Column(type: "smallint")]
private ?int $quantity = null;

public function getId(): ?int
{
return $this->id;
}

public function getRepresentation(): ?Representations
{
return $this->representation;
}

public function setRepresentation(?Representations $representation): self
{
$this->representation = $representation;
return $this;
}

public function getReservation(): ?Reservations
{
return $this->reservation;
}

public function setReservation(?Reservations $reservation): self
{
$this->reservation = $reservation;
return $this;
}

public function getPrice(): ?Prices
{
return $this->price;
}

public function setPrice(?Prices $price): self
{
$this->price = $price;
return $this;
}

public function getQuantity(): ?int
{
return $this->quantity;
}

public function setQuantity(int $quantity): self
{
$this->quantity = $quantity;
return $this;
}
}// src/Entity/Representations.php
namespace App\Entity;

use App\Repository\RepresentationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepresentationsRepository::class)]
#[ORM\Table(name: "representations")]
class Representations
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\ManyToOne(inversedBy: "representations")]
#[ORM\JoinColumn(name: "show_id", referencedColumnName: "id", nullable: false)]
private ?Shows $show = null;

#[ORM\Column(type: Types::DATETIME_MUTABLE)]
private ?\DateTimeInterface $schedule = null;

#[ORM\ManyToOne(inversedBy: "representations")]
#[ORM\JoinColumn(name: "location_id", referencedColumnName: "id")]
private ?Locations $location = null;

#[ORM\OneToMany(mappedBy: "representation", targetEntity: RepresentationReservation::class)]
private Collection $representationReservations;

public function __construct()
{
$this->representationReservations = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getShow(): ?Shows
{
return $this->show;
}

public function setShow(?Shows $show): self
{
$this->show = $show;
return $this;
}

public function getSchedule(): ?\DateTimeInterface
{
return $this->schedule;
}

public function setSchedule(\DateTimeInterface $schedule): self
{
$this->schedule = $schedule;
return $this;
}

public function getLocation(): ?Locations
{
return $this->location;
}

public function setLocation(?Locations $location): self
{
$this->location = $location;
return $this;
}

/**
* @return Collection<int, RepresentationReservation>
*/
public function getRepresentationReservations(): Collection
{
return $this->representationReservations;
}

public function addRepresentationReservation(RepresentationReservation $representationReservation): self
{
if (!$this->representationReservations->contains($representationReservation)) {
$this->representationReservations->add($representationReservation);
$representationReservation->setRepresentation($this);
}

return $this;
}

public function removeRepresentationReservation(RepresentationReservation $representationReservation): self
{
if ($this->representationReservations->removeElement($representationReservation)) {
if ($representationReservation->getRepresentation() === $this) {
$representationReservation->setRepresentation(null);
}
}

return $this;
}
}// src/Entity/Artists.php
namespace App\Entity;

use App\Repository\ArtistsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistsRepository::class)]
#[ORM\Table(name: "artists")]
class Artists
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 60)]
private ?string $firstname = null;

#[ORM\Column(length: 60)]
private ?string $lastname = null;

#[ORM\OneToMany(mappedBy: "artist", targetEntity: ArtisteType::class)]
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

public function setFirstname(string $firstname): self
{
$this->firstname = $firstname;
return $this;
}

public function getLastname(): ?string
{
return $this->lastname;
}

public function setLastname(string $lastname): self
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

public function addArtisteType(ArtisteType $artisteType): self
{
if (!$this->artisteTypes->contains($artisteType)) {
$this->artisteTypes->add($artisteType);
$artisteType->setArtist($this);
}

return $this;
}

public function removeArtisteType(ArtisteType $artisteType): self
{
if ($this->artisteTypes->removeElement($artisteType)) {
if ($artisteType->getArtist() === $this) {
$artisteType->setArtist(null);
}
}

return $this;
}
}// src/Entity/Locations.php
namespace App\Entity;

use App\Repository\LocationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationsRepository::class)]
#[ORM\Table(name: "locations")]
class Locations
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 60)]
private ?string $slug = null;

#[ORM\Column(length: 60)]
private ?string $designation = null;

#[ORM\Column(length: 255)]
private ?string $address = null;

#[ORM\ManyToOne(inversedBy: "locations")]
#[ORM\JoinColumn(name: "locality_id", referencedColumnName: "id")]
private ?Localities $locality = null;

#[ORM\Column(length: 255, nullable: true)]
private ?string $website = null;

#[ORM\Column(length: 30, nullable: true)]
private ?string $phone = null;

#[ORM\OneToMany(mappedBy: "location", targetEntity: Shows::class)]
private Collection $shows;

#[ORM\OneToMany(mappedBy: "location", targetEntity: Representations::class)]
private Collection $representations;

public function __construct()
{
$this->shows = new ArrayCollection();
$this->representations = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getSlug(): ?string
{
return $this->slug;
}

public function setSlug(string $slug): self
{
$this->slug = $slug;
return $this;
}

public function getDesignation(): ?string
{
return $this->designation;
}

public function setDesignation(string $designation): self
{
$this->designation = $designation;
return $this;
}

public function getAddress(): ?string
{
return $this->address;
}

public function setAddress(string $address): self
{
$this->address = $address;
return $this;
}

public function getLocality(): ?Localities
{
return $this->locality;
}

public function setLocality(?Localities $locality): self
{
$this->locality = $locality;
return $this;
}

public function getWebsite(): ?string
{
return $this->website;
}

public function setWebsite(?string $website): self
{
$this->website = $website;
return $this;
}

public function getPhone(): ?string
{
return $this->phone;
}

public function setPhone(?string $phone): self
{
$this->phone = $phone;
return $this;
}

/**
* @return Collection<int, Shows>
*/
public function getShows(): Collection
{
return $this->shows;
}

public function addShow(Shows $show): self
{
if (!$this->shows->contains($show)) {
$this->shows->add($show);
$show->setLocation($this);
}

return $this;
}

public function removeShow(Shows $show): self
{
if ($this->shows->removeElement($show)) {
if ($show->getLocation() === $this) {
$show->setLocation(null);
}
}

return $this;
}

/**
* @return Collection<int, Representations>
*/
public function getRepresentations(): Collection
{
return $this->representations;
}

public function addRepresentation(Representations $representation): self
{
if (!$this->representations->contains($representation)) {
$this->representations->add($representation);
$representation->setLocation($this);
}

return $this;
}

public function removeRepresentation(Representations $representation): self
{
if ($this->representations->removeElement($representation)) {
if ($representation->getLocation() === $this) {
$representation->setLocation(null);
}
}

return $this;
}
}// src/Entity/Localities.php
namespace App\Entity;

use App\Repository\LocalitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocalitiesRepository::class)]
#[ORM\Table(name: "localities")]
class Localities
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 6)]
private ?string $postal_code = null;

#[ORM\Column(length: 60)]
private ?string $locality = null;

#[ORM\OneToMany(mappedBy: "locality", targetEntity: Locations::class)]
private Collection $locations;

public function __construct()
{
$this->locations = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getPostalCode(): ?string
{
return $this->postal_code;
}

public function setPostalCode(string $postal_code): self
{
$this->postal_code = $postal_code;
return $this;
}

public function getLocality(): ?string
{
return $this->locality;
}

public function setLocality(string $locality): self
{
$this->locality = $locality;
return $this;
}

/**
* @return Collection<int, Locations>
*/
public function getLocations(): Collection
{
return $this->locations;
}

public function addLocation(Locations $location): self
{
if (!$this->locations->contains($location)) {
$this->locations->add($location);
$location->setLocality($this);
}

return $this;
}

public function removeLocation(Locations $location): self
{
if ($this->locations->removeElement($location)) {
if ($location->getLocality() === $this) {
$location->setLocality(null);
}
}

return $this;
}
}// src/Entity/ArtisteTypeShow.php
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

public function setArtisteType(?ArtisteType $artisteType): self
{
$this->artisteType = $artisteType;
return $this;
}

public function getShow(): ?Shows
{
return $this->show;
}

public function setShow(?Shows $show): self
{
$this->show = $show;
return $this;
}
}// src/Entity/ArtisteType.php
namespace App\Entity;

use App\Repository\ArtisteTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteTypeRepository::class)]
#[ORM\Table(name: "artiste_type")]
class ArtisteType
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\ManyToOne(inversedBy: "artisteTypes")]
#[ORM\JoinColumn(name: "artist_id", referencedColumnName: "id", nullable: false)]
private ?Artists $artist = null;

#[ORM\ManyToOne(inversedBy: "artisteTypes")]
#[ORM\JoinColumn(name: "type_id", referencedColumnName: "id", nullable: false)]
private ?Types $type = null;

#[ORM\OneToMany(mappedBy: "artisteType", targetEntity: ArtisteTypeShow::class)]
private Collection $artisteTypeShows;

public function __construct()
{
$this->artisteTypeShows = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getArtist(): ?Artists
{
return $this->artist;
}

public function setArtist(?Artists $artist): self
{
$this->artist = $artist;
return $this;
}

public function getType(): ?Types
{
return $this->type;
}

public function setType(?Types $type): self
{
$this->type = $type;
return $this;
}

/**
* @return Collection<int, ArtisteTypeShow>
*/
public function getArtisteTypeShows(): Collection
{
return $this->artisteTypeShows;
}

public function addArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): self
{
if (!$this->artisteTypeShows->contains($artisteTypeShow)) {
$this->artisteTypeShows->add($artisteTypeShow);
$artisteTypeShow->setArtisteType($this);
}

return $this;
}

public function removeArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): self
{
if ($this->artisteTypeShows->removeElement($artisteTypeShow)) {
if ($artisteTypeShow->getArtisteType() === $this) {
$artisteTypeShow->setArtisteType(null);
}
}

return $this;
}
}// src/Entity/Prices.php
namespace App\Entity;

use App\Repository\PricesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PricesRepository::class)]
#[ORM\Table(name: "prices")]
class Prices
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 30)]
private ?string $type = null;

#[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
private ?string $price = null;

#[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
private ?\DateTimeInterface $start_date = null;

#[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
private ?\DateTimeInterface $end_date = null;

#[ORM\OneToMany(mappedBy: "price", targetEntity: RepresentationReservation::class)]
private Collection $representationReservations;

public function __construct()
{
$this->representationReservations = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getType(): ?string
{
return $this->type;
}

public function setType(string $type): self
{
$this->type = $type;
return $this;
}

public function getPrice(): ?string
{
return $this->price;
}

public function setPrice(string $price): self
{
$this->price = $price;
return $this;
}

public function getStartDate(): ?\DateTimeInterface
{
return $this->start_date;
}

public function setStartDate(?\DateTimeInterface $start_date): self
{
$this->start_date = $start_date;
return $this;
}

public function getEndDate(): ?\DateTimeInterface
{
return $this->end_date;
}

public function setEndDate(?\DateTimeInterface $end_date): self
{
$this->end_date = $end_date;
return $this;
}

/**
* @return Collection<int, RepresentationReservation>
*/
public function getRepresentationReservations(): Collection
{
return $this->representationReservations;
}

public function addRepresentationReservation(RepresentationReservation $representationReservation): self
{
if (!$this->representationReservations->contains($representationReservation)) {
$this->representationReservations->add($representationReservation);
$representationReservation->setPrice($this);
}

return $this;
}

public function removeRepresentationReservation(RepresentationReservation $representationReservation): self
{
if ($this->representationReservations->removeElement($representationReservation)) {
if ($representationReservation->getPrice() === $this) {
$representationReservation->setPrice(null);
}
}

return $this;
}
}// src/Entity/Reviews.php
namespace App\Entity;

use App\Repository\ReviewsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewsRepository::class)]
#[ORM\Table(name: "reviews")]
class Reviews
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\ManyToOne]
#[ORM\JoinColumn(name: "user_id", referencedColumnName: "id", nullable: false)]
private ?User $user = null;

#[ORM\ManyToOne(inversedBy: "reviews")]
#[ORM\JoinColumn(name: "show_id", referencedColumnName: "id", nullable: false)]
private ?Shows $show = null;

#[ORM\Column(type: Types::TEXT)]
private ?string $review = null;

#[ORM\Column(type: "smallint", options: ["unsigned" => true])]
private ?int $stars = null;

#[ORM\Column(type: "boolean")]
private ?bool $validated = null;

#[ORM\Column(type: Types::DATETIME_MUTABLE)]
private ?\DateTimeInterface $created_at = null;

#[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
private ?\DateTimeInterface $updated_at = null;

public function getId(): ?int
{
return $this->id;
}

public function getUser(): ?User
{
return $this->user;
}

public function setUser(?User $user): self
{
$this->user = $user;
return $this;
}

public function getShow(): ?Shows
{
return $this->show;
}

public function setShow(?Shows $show): self
{
$this->show = $show;
return $this;
}

public function getReview(): ?string
{
return $this->review;
}

public function setReview(string $review): self
{
$this->review = $review;
return $this;
}

public function getStars(): ?int
{
return $this->stars;
}

public function setStars(int $stars): self
{
$this->stars = $stars;
return $this;
}

public function isValidated(): ?bool
{
return $this->validated;
}

public function setValidated(bool $validated): self
{
$this->validated = $validated;
return $this;
}

public function getCreatedAt(): ?\DateTimeInterface
{
return $this->created_at;
}

public function setCreatedAt(\DateTimeInterface $created_at): self
{
$this->created_at = $created_at;
return $this;
}

public function getUpdatedAt(): ?\DateTimeInterface
{
return $this->updated_at;
}

public function setUpdatedAt(?\DateTimeInterface $updated_at): self
{
$this->updated_at = $updated_at;
return $this;
}
}// src/Entity/Types.php
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

public function setType(string $type): self
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

public function addArtisteType(ArtisteType $artisteType): self
{
if (!$this->artisteTypes->contains($artisteType)) {
$this->artisteTypes->add($artisteType);
$artisteType->setType($this);
}

return $this;
}

public function removeArtisteType(ArtisteType $artisteType): self
{
if ($this->artisteTypes->removeElement($artisteType)) {
if ($artisteType->getType() === $this) {
$artisteType->setType(null);
}
}

return $this;
}
}// src/Entity/Reservations.php
namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationsRepository::class)]
#[ORM\Table(name: "reservations")]
class Reservations
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\ManyToOne]
#[ORM\JoinColumn(name: "user_id", referencedColumnName: "id", nullable: false)]
private ?User $user = null;

#[ORM\Column(type: Types::DATETIME_MUTABLE)]
private ?\DateTimeInterface $booking_date = null;

#[ORM\Column(length: 60)]
private ?string $status = null;

#[ORM\OneToMany(mappedBy: "reservation", targetEntity: RepresentationReservation::class)]
private Collection $representationReservations;

public function __construct()
{
$this->representationReservations = new ArrayCollection();
}

public function getId(): ?int
{
return $this->id;
}

public function getUser(): ?User
{
return $this->user;
}

public function setUser(?User $user): self
{
$this->user = $user;
return $this;
}

public function getBookingDate(): ?\DateTimeInterface
{
return $this->booking_date;
}

public function setBookingDate(\DateTimeInterface $booking_date): self
{
$this->booking_date = $booking_date;
return $this;
}

public function getStatus(): ?string
{
return $this->status;
}

public function setStatus(string $status): self
{
$this->status = $status;
return $this;
}

/**
* @return Collection<int, RepresentationReservation>
*/
public function getRepresentationReservations(): Collection
{
return $this->representationReservations;
}

public function addRepresentationReservation(RepresentationReservation $representationReservation): self
{
if (!$this->representationReservations->contains($representationReservation)) {
$this->representationReservations->add($representationReservation);
$representationReservation->setReservation($this);
}

return $this;
}

public function removeRepresentationReservation(RepresentationReservation $representationReservation): self
{
if ($this->representationReservations->removeElement($representationReservation)) {
if ($representationReservation->getReservation() === $this) {
$representationReservation->setReservation(null);
}
}

return $this;
}
}// src/Entity/RoleUser.php
namespace App\Entity;

use App\Repository\RoleUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleUserRepository::class)]
#[ORM\Table(name: "role_user")]
class RoleUser
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\ManyToOne(inversedBy: "roleUsers")]
#[ORM\JoinColumn(name: "role_id", referencedColumnName: "id", nullable: false)]
private ?Roles $role = null;

#[ORM\ManyToOne]
#[ORM\JoinColumn(name: "user_id", referencedColumnName: "id", nullable: false)]
private ?User $user = null;

public function getId(): ?int
{
return $this->id;
}

public function getRole(): ?Roles
{
return $this->role;
}

public function setRole(?Roles $role): self
{
$this->role = $role;
return $this;
}

public function getUser(): ?User
{
return $this->user;
}

public function setUser(?User $user): self
{
$this->user = $user;
return $this;
}
}// src/Entity/Shows.php
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
private ?Locations $location = null;

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

public function setSlug(string $slug): self
{
$this->slug = $slug;
return $this;
}

public function getTitle(): ?string
{
return $this->title;
}

public function setTitle(string $title): self
{
$this->title = $title;
return $this;
}

public function getPosterUrl(): ?string
{
return $this->poster_url;
}

public function setPosterUrl(?string $poster_url): self
{
$this->poster_url = $poster_url;
return $this;
}

public function getDuration(): ?int
{
return $this->duration;
}

public function setDuration(int $duration): self
{
$this->duration = $duration;
return $this;
}

public function getCreatedIn(): ?int
{
return $this->created_in;
}

public function setCreatedIn(int $created_in): self
{
$this->created_in = $created_in;
return $this;
}

public function getLocation(): ?Locations
{
return $this->location;
}

public function setLocation(?Locations $location): self
{
$this->location = $location;
return $this;
}

public function isBookable(): ?bool
{
return $this->bookable;
}

public function setBookable(bool $bookable): self
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

public function addRepresentation(Representations $representation): self
{
if (!$this->representations->contains($representation)) {
$this->representations->add($representation);
$representation->setShow($this);
}

return $this;
}

public function removeRepresentation(Representations $representation): self
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

public function addReview(Reviews $review): self
{
if (!$this->reviews->contains($review)) {
$this->reviews->add($review);
$review->setShow($this);
}

return $this;
}

public function removeReview(Reviews $review): self
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

public function addArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): self
{
if (!$this->artisteTypeShows->contains($artisteTypeShow)) {
$this->artisteTypeShows->add($artisteTypeShow);
$artisteTypeShow->setShow($this);
}

return $this;
}

public function removeArtisteTypeShow(ArtisteTypeShow $artisteTypeShow): self
{
if ($this->artisteTypeShows->removeElement($artisteTypeShow)) {
if ($artisteTypeShow->getShow() === $this) {
$artisteTypeShow->setShow(null);
}
}

return $this;
}
}CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(30) NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(60) NOT NULL, lastname VARCHAR(100) NOT NULL, email VARCHAR(100) NOT NULL, langue VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
