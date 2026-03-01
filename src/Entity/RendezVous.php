<?php

namespace App\Entity;

use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\RendezVousRepository;
use App\Entity\Consultation;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /** @var int|null */
    private ?int $id = null;

    // ✅ CORRIGÉ : DateTime → DateTimeImmutable
    #[ORM\Column(type: 'datetime_immutable')]
    #[Assert\NotBlank(message: "La date et l'heure sont obligatoires")]
    #[Assert\GreaterThan("today", message: "La date du rendez-vous doit être dans le futur")]
    private ?\DateTimeImmutable $dateHeure = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le motif est obligatoire")]
    #[Assert\Length(min: 5, max: 255, minMessage: "Le motif doit faire au moins 5 caractères", maxMessage: "Le motif ne doit pas dépasser 255 caractères")]
    #[Assert\Regex(pattern: "/^[a-zA-Z0-9\s\-àâäéèêëïîôöùûç]+$/", message: "Le motif ne peut contenir que des lettres, chiffres et espaces")]
    private ?string $motif = null;

    #[ORM\Column(length: 50)]
    #[Assert\Choice(choices: ['DEMANDE', 'CONFIRME', 'REALISE', 'ANNULE'], message: "Le statut doit être l'une des valeurs valides")]
    private string $statut = 'DEMANDE';

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Le mode de consultation est obligatoire")]
    #[Assert\Choice(choices: ['PRESENTIEL', 'TELECONSULTATION'], message: "Le mode doit être 'Présentiel' ou 'Téléconsultation'")]
    private string $mode;

    #[ORM\ManyToOne(inversedBy: 'rendezVousPatient')]
    // ✅ CORRIGÉ : ajout onDelete CASCADE
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $patient = null;

    #[ORM\ManyToOne(inversedBy: 'rendezVousSpecialiste')]
    // ✅ CORRIGÉ : ajout onDelete CASCADE
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $specialiste = null;

    #[ORM\OneToOne(mappedBy: 'rendezVous', cascade: ['persist', 'remove'])]
    private ?Consultation $consultation = null;

    public function __construct()
    {
        $this->statut = 'DEMANDE';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTimeImmutable
    {
        return $this->dateHeure;
    }

    // ✅ CORRIGÉ : setter accepte DateTimeImmutable
    public function setDateHeure(\DateTimeImmutable $dateHeure): static
    {
        $this->dateHeure = $dateHeure;
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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = strtoupper($statut);
        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): static
    {
        $this->mode = $mode;
        return $this;
    }

    public function getPatient(): ?Utilisateur
    {
        return $this->patient;
    }

    public function setPatient(?Utilisateur $patient): static
    {
        $this->patient = $patient;
        return $this;
    }

    public function getSpecialiste(): ?Utilisateur
    {
        return $this->specialiste;
    }

    public function setSpecialiste(?Utilisateur $specialiste): static
    {
        $this->specialiste = $specialiste;
        return $this;
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(?Consultation $consultation): static
    {
        if ($consultation && $consultation->getRendezVous() !== $this) {
            $consultation->setRendezVous($this);
        }
        $this->consultation = $consultation;
        return $this;
    }

    // ✅ CORRIGÉ : comparaison avec DateTimeImmutable
    public function isPassed(): bool
    {
        return $this->dateHeure < new \DateTimeImmutable();
    }

    public function isDemande(): bool
    {
        return $this->statut === 'DEMANDE';
    }

    public function isConfirme(): bool
    {
        return $this->statut === 'CONFIRME';
    }

    public function isAnnule(): bool
    {
        return $this->statut === 'ANNULE';
    }

    public function isRealise(): bool
    {
        return $this->statut === 'REALISE';
    }
}