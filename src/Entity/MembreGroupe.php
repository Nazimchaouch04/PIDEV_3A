<?php

namespace App\Entity;

use App\Repository\MembreGroupeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembreGroupeRepository::class)]
#[ORM\Table(name: 'membre_groupe')]
class MembreGroupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAdhesion = null;

    #[ORM\Column(length: 50)]
    private ?string $roleMembre = 'membre';

    #[ORM\ManyToOne(inversedBy: 'membresGroupes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'membres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GroupeSoutien $groupe = null;

    public function __construct()
    {
        $this->dateAdhesion = new \DateTime();
        $this->roleMembre = 'membre';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAdhesion(): ?\DateTimeInterface
    {
        return $this->dateAdhesion;
    }

    public function setDateAdhesion(\DateTimeInterface $dateAdhesion): static
    {
        $this->dateAdhesion = $dateAdhesion;
        return $this;
    }

    public function getRoleMembre(): ?string
    {
        return $this->roleMembre;
    }

    public function setRoleMembre(string $roleMembre): static
    {
        $this->roleMembre = $roleMembre;
        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function getGroupe(): ?GroupeSoutien
    {
        return $this->groupe;
    }

    public function setGroupe(?GroupeSoutien $groupe): static
    {
        $this->groupe = $groupe;
        return $this;
    }

    public function isAdmin(): bool
    {
        return $this->roleMembre === 'admin';
    }
}