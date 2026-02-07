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
    #[Assert\Length(max: 100)]
    private ?string $nomAliment = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Les calories sont requises')]
    #[Assert\Positive(message: 'Les calories doivent etre positives')]
    private ?int $calories = null;

    #[ORM\Column]
    #[Assert\Range(min: 0, max: 100, notInRangeMessage: 'L\'index glycemique doit etre entre {{ min }} et {{ max }}')]
    private ?int $indexGlycemique = null;

    #[ORM\Column]
    private bool $estExcitant = false;

    #[ORM\ManyToOne(inversedBy: 'aliments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Repas $repas = null;

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
}
