<?php

namespace App\Entity;

use App\Repository\MentalCheckInRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MentalCheckInRepository::class)]
class MentalCheckIn
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $humeur = null; // 'heureux', 'triste', 'fatigue', 'stressé', 'calme'

    #[ORM\Column]
    private ?int $niveauEnergie = null; // 1-10

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notePersonnelle = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCheckIn = null;

    #[ORM\ManyToOne(inversedBy: 'mentalCheckIns')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reponseCoach = null;

    public function __construct()
    {
        $this->dateCheckIn = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHumeur(): ?string
    {
        return $this->humeur;
    }

    public function setHumeur(string $humeur): static
    {
        $this->humeur = $humeur;
        return $this;
    }

    public function getNiveauEnergie(): ?int
    {
        return $this->niveauEnergie;
    }

    public function setNiveauEnergie(int $niveauEnergie): static
    {
        $this->niveauEnergie = $niveauEnergie;
        return $this;
    }

    public function getNotePersonnelle(): ?string
    {
        return $this->notePersonnelle;
    }

    public function setNotePersonnelle(?string $notePersonnelle): static
    {
        $this->notePersonnelle = $notePersonnelle;
        return $this;
    }

    public function getDateCheckIn(): ?\DateTimeInterface
    {
        return $this->dateCheckIn;
    }

    public function setDateCheckIn(\DateTimeInterface $dateCheckIn): static
    {
        $this->dateCheckIn = $dateCheckIn;
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

    public function getReponseCoach(): ?string
    {
        return $this->reponseCoach;
    }

    public function setReponseCoach(?string $reponseCoach): static
    {
        $this->reponseCoach = $reponseCoach;
        return $this;
    }
}
