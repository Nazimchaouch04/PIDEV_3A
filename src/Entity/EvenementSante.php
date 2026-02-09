<?php

namespace App\Entity;

use App\Repository\EvenementSanteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EvenementSanteRepository::class)]
#[ORM\Table(name: 'evenement_sante')]
class EvenementSante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le titre de l\'evenement est requis')]
    private ?string $titreEvent = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotNull(message: 'La date est requise')]
    #[Assert\GreaterThan("now", message: "La date doit être dans le futur")]
    private ?\DateTimeInterface $dateEvent = null;

    #[ORM\Column]
    private int $pointsParticipation = 10;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?GroupeSoutien $groupe = null;

    public function getId(): ?int
    {
        return $this->id; 
    }

    public function getTitreEvent(): ?string
    {
        return $this->titreEvent;
    }

    public function setTitreEvent(string $titreEvent): static
    {
        $this->titreEvent = $titreEvent;
        return $this;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->dateEvent;
    }

    public function setDateEvent(\DateTimeInterface $dateEvent): static
    {
        $this->dateEvent = $dateEvent;
        return $this;
    }

    public function getPointsParticipation(): int
    {
        return $this->pointsParticipation;
    }

    public function setPointsParticipation(int $pointsParticipation): static
    {
        $this->pointsParticipation = $pointsParticipation;
        return $this;
    }

    public function getGroupe(): ?GroupeSoutien
    {
        return $this->groupe;
    }

    public function setGroupe(?GroupeSoutien $groupe): static
    {
        $this->groupe = $groupe;
        return $this;
    }

    public function isUpcoming(): bool
    {
        return $this->dateEvent > new \DateTime();
    }
}