<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
class Personnel extends Utilisateur
{

    const ADMIN = [
        0 => 'Membre du personnel',
        1 => 'Admin'
    ];
    
    #[ORM\Column(length: 50)]
    private ?string $role = null;

    #[ORM\Column(type:'boolean')]
    private ?bool $admin = false;

   public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getAdminType(): string
    {
        return self::ADMIN[$this->admin];
    }
}
