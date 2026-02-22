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

    #[ORM\ManyToOne(inversedBy: 'seancesSport')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    /**
     * @var Collection<int, Exercice>
     */
    #[ORM\OneToMany(targetEntity: Exercice::class, mappedBy: 'seance', orphanRemoval: true, cascade: ['persist'])]
    private Collection $exercices;

    public function __construct()
    {
        $this->exercices = new ArrayCollection();
        $this->dateSeance = new \DateTime();
    }

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
        foreach ($this->exercices as $exercice) {
            $total += $exercice->getCaloriesParMinute() * ($this->dureeMinutes / count($this->exercices));
        }
        return $total;
    }
}
