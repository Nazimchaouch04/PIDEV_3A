<?php

namespace App\Entity;

use App\Repository\GroupeSoutienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GroupeSoutienRepository::class)]
#[ORM\Table(name: 'groupe_soutien')]
class GroupeSoutien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom du groupe est requis')]
    private ?string $nomGroupe = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'La thématique est requise')]
    private ?string $thematique = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Range(min: 1, max: 20)]
    private ?int $capaciteMax = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(targetEntity: EvenementSante::class, mappedBy: 'groupe', orphanRemoval: true)]
    private Collection $evenements;

    #[ORM\OneToMany(targetEntity: MembreGroupe::class, mappedBy: 'groupe', orphanRemoval: true)]
    private Collection $membres;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
        $this->membres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nomGroupe;
    }

    public function setNomGroupe(string $nomGroupe): static
    {
        $this->nomGroupe = $nomGroupe;
        return $this;
    }

    public function getThematique(): ?string
    {
        return $this->thematique;
    }

    public function setThematique(string $thematique): static
    {
        $this->thematique = $thematique;
        return $this;
    }

    public function getCapaciteMax(): ?int
    {
        return $this->capaciteMax;
    }

    public function setCapaciteMax(int $capaciteMax): static
    {
        $this->capaciteMax = $capaciteMax;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;
        return $this;
    }

    /** @return Collection<int, EvenementSante> */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    /** @return Collection<int, MembreGroupe> */
    public function getMembres(): Collection
    {
        return $this->membres;
    }

    public function getNombreMembres(): int
    {
        return $this->membres->count();
    }

    public function hasPlaceDisponible(): bool
    {
        return $this->membres->count() < $this->capaciteMax;
    }
}