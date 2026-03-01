<?php

namespace App\Entity;

use App\Repository\SeanceSportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SeanceSportRepository::class)]
#[ORM\Table(name: 'seance_sport')]
class SeanceSport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /** @var int|null */
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom de la seance est requis')]
    #[Assert\Length(max: 100)]
    private ?string $nomSeance = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotNull(message: 'L\'heure de debut est requise')]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'La duree est requise')]
    #[Assert\Positive(message: 'La duree doit etre positive')]
    #[Assert\DivisibleBy(value: 5, message: 'La duree doit etre divisible par 5')]
    private ?int $dureeMinutes = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $medailleObtenue = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSeance = null;

    // =========================================================================
    // ════════════════  NOUVEAUX CHAMPS — Alerte Intelligente  ════════════════
    // =========================================================================

    /** Heure réelle de démarrage de la séance (bouton "Démarrer") */
    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heureDebutReelle = null;

    /** Evite d'envoyer l'alerte plusieurs fois */
    #[ORM\Column(type: 'boolean')]
    private bool $alerteEnvoyee = false;

    // =========================================================================

    #[ORM\ManyToOne(inversedBy: 'seancesSport')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateur = null;

    /**
     * @var Collection<int, Exercice>
     */
    #[ORM\OneToMany(targetEntity: Exercice::class, mappedBy: 'seance', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $exercices;

    public function __construct()
    {
        $this->exercices = new ArrayCollection();
        $this->dateSeance = new \DateTime();
    }

    // =========================================================================
    // ════════════════  GETTERS / SETTERS EXISTANTS  ══════════════════════════
    // =========================================================================

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSeance(): ?string
    {
        return $this->nomSeance;
    }

    public function setNomSeance(string $nomSeance): static
    {
        $this->nomSeance = $nomSeance;
        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): static
    {
        $this->heureDebut = $heureDebut;
        return $this;
    }

    public function getDureeMinutes(): ?int
    {
        return $this->dureeMinutes;
    }

    public function setDureeMinutes(int $dureeMinutes): static
    {
        $this->dureeMinutes = $dureeMinutes;
        return $this;
    }

    public function getMedailleObtenue(): ?string
    {
        return $this->medailleObtenue;
    }

    public function setMedailleObtenue(?string $medailleObtenue): static
    {
        $this->medailleObtenue = $medailleObtenue;
        return $this;
    }

    public function getDateSeance(): ?\DateTimeInterface
    {
        return $this->dateSeance;
    }

    public function setDateSeance(\DateTimeInterface $dateSeance): static
    {
        $this->dateSeance = $dateSeance;
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

    /**
     * @return Collection<int, Exercice>
     */
    public function getExercices(): Collection
    {
        return $this->exercices;
    }

    public function addExercice(Exercice $exercice): static
    {
        if (!$this->exercices->contains($exercice)) {
            $this->exercices->add($exercice);
            $exercice->setSeance($this);
        }
        return $this;
    }

    public function removeExercice(Exercice $exercice): static
    {
        if ($this->exercices->removeElement($exercice)) {
            if ($exercice->getSeance() === $this) {
                $exercice->setSeance(null);
            }
        }
        return $this;
    }

    public function getTotalCaloriesBrulees(): float
    {
        $total = 0;
        $count = count($this->exercices);
        if ($count === 0) return 0;
        foreach ($this->exercices as $exercice) {
            $total += (float) $exercice->getCaloriesParMinute() * ($this->dureeMinutes / $count);
        }
        return $total;
    }

    // =========================================================================
    // ════════════════  NOUVEAUX GETTERS/SETTERS — Alerte  ════════════════════
    // =========================================================================

    public function getHeureDebutReelle(): ?\DateTimeInterface
    {
        return $this->heureDebutReelle;
    }

    public function setHeureDebutReelle(?\DateTimeInterface $heureDebutReelle): static
    {
        $this->heureDebutReelle = $heureDebutReelle;
        return $this;
    }

    public function isAlerteEnvoyee(): bool
    {
        return $this->alerteEnvoyee;
    }

    public function setAlerteEnvoyee(bool $alerteEnvoyee): static
    {
        $this->alerteEnvoyee = $alerteEnvoyee;
        return $this;
    }

    // =========================================================================
    // ════════════════  MÉTHODES UTILITAIRES — Alerte  ════════════════════════
    // =========================================================================

    /**
     * Calcule le score de risque (0-100) pour l'alerte intelligente
     * Basé sur : dépassement temps + intensité exercices + âge utilisateur + calories ML
     */
    public function calculerScoreRisque(?float $caloriesPredites = null): int
    {
        $score = 0;

        // ① Dépassement de temps — ✅ CORRIGÉ avec timestamps
        if ($this->heureDebutReelle !== null) {
            $maintenant      = new \DateTime();
            $secondesEcoulees = $maintenant->getTimestamp() - $this->heureDebutReelle->getTimestamp();
            $minutesEcoulees  = (int)($secondesEcoulees / 60);
            $depassement      = $minutesEcoulees - ($this->dureeMinutes ?? 0);

            if ($depassement > 0) {
                $score += min(40, $depassement * 4); // max 40 points
            }
        }

        // ② Intensité des exercices
        $nbElevee = 0;
        $total    = count($this->exercices);
        foreach ($this->exercices as $e) {
            if (strtolower($e->getIntensite()->value) === 'elevee') {
                $nbElevee++;
            }
        }
        if ($total > 0) {
            $ratioElevee = $nbElevee / $total;
            $score += (int)($ratioElevee * 30); // max 30 points
        }

        // ③ Âge de l'utilisateur (risque plus élevé > 50 ans)
        $profil = $this->utilisateur?->getProfilSante();
        if ($profil && $profil->getAge() > 50) {
            $score += 15;
        } elseif ($profil && $profil->getAge() > 40) {
            $score += 8;
        }

        // ④ Calories prédites par le modèle ML
        if ($caloriesPredites !== null) {
            $age   = $profil?->getAge() ?? 25;
            $seuil = $age > 50 ? 400 : ($age > 40 ? 550 : 700);
            if ($caloriesPredites > $seuil) {
                $score += 15;
            }
        }

        return min(100, $score);
    }

    /**
     * Retourne le niveau d'alerte selon le score
     */
    public function getNiveauAlerte(?float $caloriesPredites = null): string
    {
        $score = $this->calculerScoreRisque($caloriesPredites);
        if ($score >= 60) return 'critique';
        if ($score >= 30) return 'attention';
        return 'normal';
    }

    /**
     * Vérifie si la séance est actuellement en cours aujourd'hui
     */
    public function estEnCours(): bool
    {
        if ($this->heureDebutReelle === null) return false;
        $aujourd_hui = new \DateTime('today');
        $dateSeance  = \DateTime::createFromInterface($this->dateSeance);
        $dateSeance->setTime(0, 0, 0);
        return $dateSeance == $aujourd_hui;
    }
}
