<?php

namespace App\Entity;

use App\Repository\ProfilSanteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProfilSanteRepository::class)]
#[ORM\Table(name: 'profil_sante')]
class ProfilSante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /** @var int|null */
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'L\'âge est requis')]
    #[Assert\Range(
        min: 15,
        max: 100,
        notInRangeMessage: 'L\'âge doit être entre {{ min }} et {{ max }} ans'
    )]
    private ?int $age = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le poids est requis')]
    #[Assert\Range(
        min: 20,
        max: 500,
        notInRangeMessage: 'Le poids doit être entre {{ min }} et {{ max }} kg'
    )]
    private ?float $poids = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotBlank(message: 'L\'heure de réveil est requise')]
    private ?\DateTimeInterface $heureReveil = null;

    #[ORM\OneToOne(inversedBy: 'profilSante', targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'utilisateur_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): static
    {
        $this->age = $age;
        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(?float $poids): static
    {
        $this->poids = $poids;
        return $this;
    }

    public function getHeureReveil(): ?\DateTimeInterface
    {
        return $this->heureReveil;
    }

    public function setHeureReveil(?\DateTimeInterface $heureReveil): static
    {
        $this->heureReveil = $heureReveil;
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
}