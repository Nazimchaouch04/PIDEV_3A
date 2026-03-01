<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    /** @var int|null */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // ✅ CORRIGÉ : DateTime → DateTimeImmutable
    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    #[Assert\NotBlank(message: "La date de consultation est obligatoire")]
    #[Assert\LessThanOrEqual("today", message: "La date de consultation ne peut pas être dans le futur")]
    private ?\DateTimeImmutable $dateConsultation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(min: 10, max: 2000, minMessage: "Les symptômes doivent faire au moins 10 caractères", maxMessage: "Les symptômes ne doivent pas dépasser 2000 caractères")]
    #[Assert\Regex(pattern: "/^[a-zA-Z0-9\s\-.,;:àâäéèêëïîôöùûç]+$/", message: "Les symptômes contiennent des caractères non valides")]
    private ?string $symptomes = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(min: 10, max: 2000, minMessage: "Le diagnostic doit faire au moins 10 caractères", maxMessage: "Le diagnostic ne doit pas dépasser 2000 caractères")]
    #[Assert\Regex(pattern: "/^[a-zA-Z0-9\s\-.,;:àâäéèêëïîôöùûç]+$/", message: "Le diagnostic contient des caractères non valides")]
    private ?string $diagnostic = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Assert\Length(min: 10, max: 2000, minMessage: "Les recommandations doivent faire au moins 10 caractères", maxMessage: "Les recommandations ne doivent pas dépasser 2000 caractères")]
    #[Assert\Regex(pattern: "/^[a-zA-Z0-9\s\-.,;:àâäéèêëïîôöùûç]+$/", message: "Les recommandations contiennent des caractères non valides")]
    private ?string $recommandations = null;

    #[ORM\OneToOne(inversedBy: 'consultation')]
    #[ORM\JoinColumn(nullable: false)]
    private ?RendezVous $rendezVous = null;

    /**
     * @var Collection<int, Prescription>
     */
    // ✅ CORRIGÉ : ajout orphanRemoval=true pour supprimer les orphelins
    #[ORM\OneToMany(
        targetEntity: Prescription::class,
        mappedBy: 'consultation',
        cascade: ['persist', 'remove'],
        orphanRemoval: true
    )]
    private Collection $prescriptions;

    public function __construct()
    {
        $this->prescriptions = new ArrayCollection();
        // ✅ CORRIGÉ : DateTimeImmutable
        $this->dateConsultation = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateConsultation(): ?\DateTimeImmutable
    {
        return $this->dateConsultation;
    }

    // ✅ CORRIGÉ : setter accepte DateTimeImmutable
    public function setDateConsultation(\DateTimeImmutable $dateConsultation): static
    {
        $this->dateConsultation = $dateConsultation;
        return $this;
    }

    public function getSymptomes(): ?string
    {
        return $this->symptomes;
    }

    public function setSymptomes(string $symptomes): static
    {
        $this->symptomes = $symptomes;
        return $this;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(string $diagnostic): static
    {
        $this->diagnostic = $diagnostic;
        return $this;
    }

    public function getRecommandations(): ?string
    {
        return $this->recommandations;
    }

    public function setRecommandations(string $recommandations): static
    {
        $this->recommandations = $recommandations;
        return $this;
    }

    public function getRendezVous(): ?RendezVous
    {
        return $this->rendezVous;
    }

    public function setRendezVous(RendezVous $rendezVous): static
    {
        $this->rendezVous = $rendezVous;
        return $this;
    }

    /**
     * @return Collection<int, Prescription>
     */
    public function getPrescriptions(): Collection
    {
        return $this->prescriptions;
    }

    public function addPrescription(Prescription $prescription): static
    {
        if (!$this->prescriptions->contains($prescription)) {
            $this->prescriptions->add($prescription);
            $prescription->setConsultation($this);
        }
        return $this;
    }

    public function removePrescription(Prescription $prescription): static
    {
        if ($this->prescriptions->removeElement($prescription)) {
            if ($prescription->getConsultation() === $this) {
                $prescription->setConsultation(null);
            }
        }
        return $this;
    }
}