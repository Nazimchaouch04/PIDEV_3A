<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
#[ORM\Table(name: 'rendez_vous')]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull(message: 'La date et heure du rendez-vous sont requises')]
    #[Assert\GreaterThan('now', message: 'Le rendez-vous doit etre dans le futur')]
    private ?\DateTimeInterface $dateHeureRdv = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Le motif est requis')]
    private ?string $motif = null;

    #[ORM\Column]
    private bool $estHonore = false;

    #[ORM\ManyToOne(inversedBy: 'rendezVous')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Specialiste $specialiste = null;

    #[ORM\ManyToOne(inversedBy: 'rendezVous')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeureRdv(): ?\DateTimeInterface
    {
        return $this->dateHeureRdv;
    }

    public function setDateHeureRdv(\DateTimeInterface $dateHeureRdv): static
    {
        $this->dateHeureRdv = $dateHeureRdv;
        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;
        return $this;
    }

    public function isEstHonore(): bool
    {
        return $this->estHonore;
    }

    public function setEstHonore(bool $estHonore): static
    {
        $this->estHonore = $estHonore;
        return $this;
    }

    public function getSpecialiste(): ?Specialiste
    {
        return $this->specialiste;
    }

    public function setSpecialiste(?Specialiste $specialiste): static
    {
        $this->specialiste = $specialiste;
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

    public function isPassed(): bool
    {
        return $this->dateHeureRdv < new \DateTime();
    }
}
