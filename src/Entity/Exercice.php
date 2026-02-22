<?php

namespace App\Entity;

use App\Enum\Intensite;
use App\Repository\ExerciceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
#[ORM\Table(name: 'exercice')]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom de l\'exercice est requis')]
    #[Assert\Length(max: 100)]
    private ?string $nomExercice = null;

    #[ORM\Column(type: 'string', enumType: Intensite::class)]
    private ?Intensite $intensite = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Les calories par minute sont requises')]
    #[Assert\Positive(message: 'Les calories par minute doivent etre positives')]
    private ?float $caloriesParMinute = null;

    #[ORM\ManyToOne(inversedBy: 'exercices')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SeanceSport $seance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomExercice(): ?string
    {
        return $this->nomExercice;
    }

    public function setNomExercice(string $nomExercice): static
    {
        $this->nomExercice = $nomExercice;
        return $this;
    }

    public function getIntensite(): ?Intensite
    {
        return $this->intensite;
    }

    public function setIntensite(Intensite $intensite): static
    {
        $this->intensite = $intensite;
        return $this;
    }

    public function getCaloriesParMinute(): ?float
    {
        return $this->caloriesParMinute;
    }

    public function setCaloriesParMinute(float $caloriesParMinute): static
    {
        $this->caloriesParMinute = $caloriesParMinute;
        return $this;
    }

    public function getSeance(): ?SeanceSport
    {
        return $this->seance;
    }

    public function setSeance(?SeanceSport $seance): static
    {
        $this->seance = $seance;
        return $this;
    }
}
