<?php

namespace App\Entity;

use App\Enum\TypeMoment;
use App\Repository\RepasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RepasRepository::class)]
#[ORM\Table(name: 'repas')]
class Repas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: 'Le titre du repas est requis')]
    #[Assert\Length(max: 50)]
    private ?string $titreRepas = null;

    #[ORM\Column(type: 'string', enumType: TypeMoment::class)]
    private ?TypeMoment $typeMoment = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull(message: 'La date de consommation est requise')]
    private ?\DateTimeInterface $dateConsommation = null;

    #[ORM\Column]
    private int $pointsGagnes = 0;

    #[ORM\ManyToOne(inversedBy: 'repas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    /**
     * @var Collection<int, Aliment>
     */
    #[ORM\OneToMany(targetEntity: Aliment::class, mappedBy: 'repas', orphanRemoval: true, cascade: ['persist'])]
    private Collection $aliments;

    public function __construct()
    {
        $this->aliments = new ArrayCollection();
        $this->dateConsommation = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreRepas(): ?string
    {
        return $this->titreRepas;
    }

    public function setTitreRepas(string $titreRepas): static
    {
        $this->titreRepas = $titreRepas;
        return $this;
    }

    public function getTypeMoment(): ?TypeMoment
    {
        return $this->typeMoment;
    }

    public function setTypeMoment(TypeMoment $typeMoment): static
    {
        $this->typeMoment = $typeMoment;
        return $this;
    }

    public function getDateConsommation(): ?\DateTimeInterface
    {
        return $this->dateConsommation;
    }

    public function setDateConsommation(\DateTimeInterface $dateConsommation): static
    {
        $this->dateConsommation = $dateConsommation;
        return $this;
    }

    public function getPointsGagnes(): int
    {
        return $this->pointsGagnes;
    }

    public function setPointsGagnes(int $pointsGagnes): static
    {
        $this->pointsGagnes = $pointsGagnes;
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
     * @return Collection<int, Aliment>
     */
    public function getAliments(): Collection
    {
        return $this->aliments;
    }

    public function addAliment(Aliment $aliment): static
    {
        if (!$this->aliments->contains($aliment)) {
            $this->aliments->add($aliment);
            $aliment->setRepas($this);
        }
        return $this;
    }

    public function removeAliment(Aliment $aliment): static
    {
        if ($this->aliments->removeElement($aliment)) {
            if ($aliment->getRepas() === $this) {
                $aliment->setRepas(null);
            }
        }
        return $this;
    }

    public function getTotalCalories(): int
    {
        $total = 0;
        foreach ($this->aliments as $aliment) {
            $total += $aliment->getCalories();
        }
        return $total;
    }
}
