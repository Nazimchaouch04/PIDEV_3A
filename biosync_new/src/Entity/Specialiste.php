<?php

namespace App\Entity;

use App\Repository\SpecialisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SpecialisteRepository::class)]
#[ORM\Table(name: 'specialiste')]
class Specialiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom du docteur est requis')]
    #[Assert\Length(max: 100)]
    private ?string $nomDocteur = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'La specialite est requise')]
    #[Assert\Length(max: 100)]
    private ?string $specialite = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message: 'Le telephone est requis')]
    #[Assert\Regex(pattern: '/^[0-9+\s\-()]+$/', message: 'Le telephone n\'est pas valide')]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'La disponibilite est requise')]
    private ?string $disponibilite = null;

    /**
     * @var Collection<int, RendezVous>
     */
    #[ORM\OneToMany(targetEntity: RendezVous::class, mappedBy: 'specialiste', orphanRemoval: true)]
    private Collection $rendezVous;

    public function __construct()
    {
        $this->rendezVous = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDocteur(): ?string
    {
        return $this->nomDocteur;
    }

    public function setNomDocteur(string $nomDocteur): static
    {
        $this->nomDocteur = $nomDocteur;
        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): static
    {
        $this->disponibilite = $disponibilite;
        return $this;
    }

    /**
     * @return Collection<int, RendezVous>
     */
    public function getRendezVous(): Collection
    {
        return $this->rendezVous;
    }

    public function addRendezVou(RendezVous $rendezVou): static
    {
        if (!$this->rendezVous->contains($rendezVou)) {
            $this->rendezVous->add($rendezVou);
            $rendezVou->setSpecialiste($this);
        }
        return $this;
    }

    public function removeRendezVou(RendezVous $rendezVou): static
    {
        if ($this->rendezVous->removeElement($rendezVou)) {
            if ($rendezVou->getSpecialiste() === $this) {
                $rendezVou->setSpecialiste(null);
            }
        }
        return $this;
    }
}
