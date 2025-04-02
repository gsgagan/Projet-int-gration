<?php

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

    public function setRole(string $role): static
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

    public function addRoleUser(RoleUser $roleUser): static
    {
        if (!$this->roleUsers->contains($roleUser)) {
            $this->roleUsers->add($roleUser);
            $roleUser->setRole($this);
        }

        return $this;
    }

    public function removeRoleUser(RoleUser $roleUser): static
    {
        if ($this->roleUsers->removeElement($roleUser)) {
            if ($roleUser->getRole() === $this) {
                $roleUser->setRole(null);
            }
        }

        return $this;
    }
}