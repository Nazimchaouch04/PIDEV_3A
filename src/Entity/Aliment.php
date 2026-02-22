<?php

namespace App\Entity;

use App\Repository\AlimentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AlimentRepository::class)]
#[ORM\Table(name: 'aliment')]
class Aliment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom de l\'aliment est requis')]
    #[Assert\Length(min: 3, minMessage: 'Le nom doit contenir au moins {{ limit }} caractères', max: 100, maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères')]
    private ?string $nomAliment = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Les calories sont requises')]
    #[Assert\PositiveOrZero(message: 'Les calories doivent être supérieures ou égales à 0')]
    private ?int $calories = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Range(min: 0, max: 100, notInRangeMessage: 'L\'index glycémique doit être entre {{ min }} et {{ max }}')]
    private ?int $indexGlycemique = null;

    #[ORM\Column]
    private bool $estExcitant = false;

    #[ORM\ManyToOne(inversedBy: 'aliments')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Repas $repas = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $typeAliment = null;

    #[ORM\Column(nullable: true)]
    private ?float $multiScore = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $nutriScore = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero(message: 'Les protéines doivent être supérieures ou égales à 0')]
    private ?float $proteines = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero(message: 'Les glucides doivent être supérieurs ou égaux à 0')]
    private ?float $glucides = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero(message: 'Les lipides doivent être supérieurs ou égaux à 0')]
    private ?float $lipides = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAliment(): ?string
    {
        return $this->nomAliment;
    }

    public function setNomAliment(string $nomAliment): static
    {
        $this->nomAliment = $nomAliment;
        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(int $calories): static
    {
        $this->calories = $calories;
        return $this;
    }

    public function getIndexGlycemique(): ?int
    {
        return $this->indexGlycemique;
    }

    public function setIndexGlycemique(int $indexGlycemique): static
    {
        $this->indexGlycemique = $indexGlycemique;
        return $this;
    }

    public function isEstExcitant(): bool
    {
        return $this->estExcitant;
    }

    public function setEstExcitant(bool $estExcitant): static
    {
        $this->estExcitant = $estExcitant;
        return $this;
    }

    public function getRepas(): ?Repas
    {
        return $this->repas;
    }

    public function setRepas(?Repas $repas): static
    {
        $this->repas = $repas;
        return $this;
    }

    public function getTypeAliment(): ?string
    {
        return $this->typeAliment;
    }

    public function setTypeAliment(string $typeAliment): static
    {
        $this->typeAliment = $typeAliment;

        return $this;
    }

    public function getMultiScore(): ?float
    {
        return $this->multiScore;
    }

    public function setMultiScore(float $multiScore): static
    {
        $this->multiScore = $multiScore;

        return $this;
    }

    public function getNutriScore(): ?string
    {
        return $this->nutriScore;
    }

    public function setNutriScore(?string $nutriScore): static
    {
        $this->nutriScore = $nutriScore;

        return $this;
    }

    public function getProteines(): ?float
    {
        return $this->proteines;
    }

    public function setProteines(?float $proteines): static
    {
        $this->proteines = $proteines;

        return $this;
    }

    public function getGlucides(): ?float
    {
        return $this->glucides;
    }

    public function setGlucides(?float $glucides): static
    {
        $this->glucides = $glucides;

        return $this;
    }

    public function getLipides(): ?float
    {
        return $this->lipides;
    }

    public function setLipides(?float $lipides): static
    {
        $this->lipides = $lipides;

        return $this;
    }
}