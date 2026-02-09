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
    #[Assert\Length(max: 100)]
    private ?string $nomGroupe = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'La thematique est requise')]
    #[Assert\Length(max: 50)]
    private ?string $thematique = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'La capacite maximale est requise')]
    #[Assert\Range(min: 1, max: 20, notInRangeMessage: 'La capacite doit etre entre {{ min }} et {{ max }}')]
    private ?int $capaciteMax = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, EvenementSante>
     */
    #[ORM\OneToMany(targetEntity: EvenementSante::class, mappedBy: 'groupe', orphanRemoval: true)]
    private Collection $evenements;

    /**
     * @var Collection<int, MembreGroupe>
     */
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

    /**
     * @return Collection<int, EvenementSante>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(EvenementSante $evenement): static
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements->add($evenement);
            $evenement->setGroupe($this);
        }
        return $this;
    }

    public function removeEvenement(EvenementSante $evenement): static
    {
        if ($this->evenements->removeElement($evenement)) {
            if ($evenement->getGroupe() === $this) {
                $evenement->setGroupe(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, MembreGroupe>
     */
    public function getMembres(): Collection
    {
        return $this->membres;
    }

    public function addMembre(MembreGroupe $membre): static
    {
        if (!$this->membres->contains($membre)) {
            $this->membres->add($membre);
            $membre->setGroupe($this);
        }
        return $this;
    }

    public function removeMembre(MembreGroupe $membre): static
    {
        if ($this->membres->removeElement($membre)) {
            if ($membre->getGroupe() === $this) {
                $membre->setGroupe(null);
            }
        }
        return $this;
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
