<?php

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
    private ?Users $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?Roles
    {
        return $this->role;
    }

    public function setRole(?Roles $role): static
    {
        $this->role = $role;
        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        $this->user = $user;
        return $this;
    }
}