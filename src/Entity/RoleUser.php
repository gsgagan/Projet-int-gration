<?php

namespace App\Entity;

use App\Repository\RoleUserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleUserRepository::class)]
class RoleUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'roleUsers')]
    private ?Roles $roleId = null;

    #[ORM\ManyToOne(inversedBy: 'roleUsers')]
    private ?Users $userId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoleId(): ?Roles
    {
        return $this->roleId;
    }

    public function setRoleId(?Roles $roleId): static
    {
        $this->roleId = $roleId;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): static
    {
        $this->userId = $userId;

        return $this;
    }
}
