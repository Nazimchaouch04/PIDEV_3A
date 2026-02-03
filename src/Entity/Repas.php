<?php

namespace App\Entity;

use App\Repository\RepasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepasRepository::class)]
class Repas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titre_repas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreRepas(): ?string
    {
        return $this->titre_repas;
    }

    public function setTitreRepas(string $titre_repas): static
    {
        $this->titre_repas = $titre_repas;

        return $this;
    }
}
