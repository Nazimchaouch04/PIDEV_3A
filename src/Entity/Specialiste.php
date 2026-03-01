<?php

namespace App\Entity;

use App\Repository\SpecialisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Utilisateur;
use App\Entity\RendezVous;

#[ORM\Entity(repositoryClass: SpecialisteRepository::class)]
#[ORM\Table(name: 'specialiste')]
class Specialiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /** @var int|null */
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom du docteur est requis')]
    private ?string $nomDocteur = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'La specialite est requise')]
    private ?string $specialite = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'Le telephone est requis')]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'La disponibilite est requise')]
    private ?string $disponibilite = null;

    // ✅ CORRIGÉ : inversedBy: 'specialiste' pointe vers $specialiste ajouté dans Utilisateur
    // ✅ CORRIGÉ : ajout onDelete CASCADE pour cohérence ORM/DB
    #[ORM\OneToOne(inversedBy: 'specialiste', targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateur = null;

    // ✅ SUPPRIMÉ : la relation OneToMany vers RendezVous est incohérente car
    // RendezVous::$specialiste est un Utilisateur, pas un Specialiste.
    // Les rendez-vous du spécialiste sont accessibles via $utilisateur->getRendezVousSpecialiste()

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDocteur(): ?string
    {
        return $this->nomDocteur;
    }

    public function setNomDocteur(string $nomDocteur): static
    {
        $this->nomDocteur = $nomDocteur;
        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): static
    {
        $this->disponibilite = $disponibilite;
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

    // ✅ Raccourci pratique pour accéder aux rendez-vous via l'utilisateur lié
    public function getRendezVous(): Collection
    {
        return $this->utilisateur?->getRendezVousSpecialiste() ?? new ArrayCollection();
    }
}