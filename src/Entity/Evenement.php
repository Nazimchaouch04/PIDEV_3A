<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_event = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEvent(): ?\DateTime
    {
        return $this->date_event;
    }

    public function setDateEvent(\DateTime $date_event): static
    {
        $this->date_event = $date_event;

        return $this;
    }
}
