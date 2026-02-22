<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PrescriptionRepository::class)]
class Prescription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "Le nom du médicament est obligatoire")]
    #[Assert\Length(min: 2, max: 100, minMessage: "Le nom du médicament doit faire au moins 2 caractères", maxMessage: "Le nom du médicament ne doit pas dépasser 100 caractères")]
    #[Assert\Regex(pattern: "/^[a-zA-Z0-9\s\-àâäéèêëïîôöùûç]+$/", message: "Le nom du médicament ne peut contenir que des lettres, chiffres et espaces")]
    private ?string $nomMedicament = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La dose est obligatoire")]
    #[Assert\Length(min: 2, max: 255, minMessage: "La dose doit faire au moins 2 caractères", maxMessage: "La dose ne doit pas dépasser 255 caractères")]
    #[Assert\Regex(pattern: "/^[a-zA-Z0-9\s\-mgml]+$/", message: "La dose contient des caractères non valides")]
    private ?string $dose = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: "La fréquence est obligatoire")]
    #[Assert\Length(min: 2, max: 100, minMessage: "La fréquence doit faire au moins 2 caractères", maxMessage: "La fréquence ne doit pas dépasser 100 caractères")]
    #[Assert\Regex(pattern: "/^[a-zA-Z0-9\s\-àâäéèêëïîôöùûç]+$/", message: "La fréquence contient des caractères non valides")]
    private ?string $frequence = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La durée est obligatoire")]
    #[Assert\Positive(message: "La durée doit être un nombre positif")]
    private ?int $duree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(max: 1000, maxMessage: "Les instructions ne doivent pas dépasser 1000 caractères")]
    #[Assert\Regex(pattern: "/^[a-zA-Z0-9\s\-.,;:àâäéèêëïîôöùûç]+$/", message: "Les instructions contiennent des caractères non valides")]
    private ?string $instructions = null;

    #[ORM\ManyToOne(inversedBy: 'prescriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Consultation $consultation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMedicament(): ?string
    {
        return $this->nomMedicament;
    }

    public function setNomMedicament(string $nomMedicament): static
    {
        $this->nomMedicament = $nomMedicament;

        return $this;
    }

    public function getDose(): ?string
    {
        return $this->dose;
    }

    public function setDose(string $dose): static
    {
        $this->dose = $dose;

        return $this;
    }

    public function getFrequence(): ?string
    {
        return $this->frequence;
    }

    public function setFrequence(string $frequence): static
    {
        $this->frequence = $frequence;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    public function setInstructions(?string $instructions): static
    {
        $this->instructions = $instructions;

        return $this;
    }

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(?Consultation $consultation): static
    {
        $this->consultation = $consultation;

        return $this;
    }
}