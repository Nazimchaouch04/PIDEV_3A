<?php

namespace App\Entity;

use App\Repository\SeanceSportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeanceSportRepository::class)]
class SeanceSport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_seance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSeance(): ?string
    {
        return $this->nom_seance;
    }

    public function setNomSeance(string $nom_seance): static
    {
        $this->nom_seance = $nom_seance;

        return $this;
    }
}
