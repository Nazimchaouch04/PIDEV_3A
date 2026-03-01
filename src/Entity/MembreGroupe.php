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
    /** @var int|null */
    private ?int $id = null;

    // ✅ CORRIGÉ : DateTime → DateTimeImmutable
    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $dateAdhesion = null;

    #[ORM\Column(length: 50)]
    private string $roleMembre = 'membre';

    #[ORM\ManyToOne(inversedBy: 'membresGroupes')]
    // ✅ CORRIGÉ : ajout onDelete CASCADE pour cohérence ORM/DB
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'membres')]
    // ✅ CORRIGÉ : ajout onDelete CASCADE pour cohérence ORM/DB
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?GroupeSoutien $groupe = null;

    public function __construct()
    {
        // ✅ CORRIGÉ : DateTimeImmutable
        $this->dateAdhesion = new \DateTimeImmutable();
        $this->roleMembre = 'membre';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAdhesion(): ?\DateTimeImmutable
    {
        return $this->dateAdhesion;
    }

    // ✅ CORRIGÉ : setter accepte DateTimeImmutable
    public function setDateAdhesion(\DateTimeImmutable $dateAdhesion): static
    {
        $this->dateAdhesion = $dateAdhesion;
        return $this;
    }

    public function getRoleMembre(): string
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