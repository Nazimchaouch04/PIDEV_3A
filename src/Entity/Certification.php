<?php

namespace App\Entity;

use App\Repository\CertificationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CertificationRepository::class)]
class Certification
{
    /** @var int|null */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: "Le type de certification est requis")]
    private ?string $type = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "La spécialité est requise")]
    private ?string $specialite = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "Le numéro d'enregistrement est requis")]
    private ?string $numeroEnregistrement = null;

    #[ORM\Column(length: 255)]
    private ?string $diplomeFilename = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "La motivation est requise")]
    private ?string $motivation = null;

    #[ORM\Column(length: 20)]
    private string $statut = 'PENDING';

    #[ORM\OneToOne(inversedBy: 'certification', targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateur = null;

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

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $s): self
    {
        $this->specialite = $s;
        return $this;
    }

    public function getNumeroEnregistrement(): ?string
    {
        return $this->numeroEnregistrement;
    }

    public function setNumeroEnregistrement(string $n): self
    {
        $this->numeroEnregistrement = $n;
        return $this;
    }

    public function getDiplomeFilename(): ?string
    {
        return $this->diplomeFilename;
    }

    public function setDiplomeFilename(string $f): self
    {
        $this->diplomeFilename = $f;
        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(string $motivation): self
    {
        $this->motivation = $motivation;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $s): self
    {
        $this->statut = $s;
        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $u): self
    {
        $this->utilisateur = $u;
        return $this;
    }
}