<?php

namespace App\Entity;

use App\Repository\CognitiveInsightRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CognitiveInsightRepository::class)]
#[ORM\Table(name: 'cognitive_insight')]
class CognitiveInsight
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cognitiveInsights')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $analyse = null;

    #[ORM\Column(length: 50)]
    private ?string $humeurPredite = null;

    #[ORM\Column(type: Types::JSON)]
    private array $scoresEvolution = [];

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAnalyse = null;

    public function __construct()
    {
        $this->dateAnalyse = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAnalyse(): ?string
    {
        return $this->analyse;
    }

    public function setAnalyse(string $analyse): static
    {
        $this->analyse = $analyse;
        return $this;
    }

    public function getHumeurPredite(): ?string
    {
        return $this->humeurPredite;
    }

    public function setHumeurPredite(string $humeurPredite): static
    {
        $this->humeurPredite = $humeurPredite;
        return $this;
    }

    public function getScoresEvolution(): array
    {
        return $this->scoresEvolution;
    }

    public function setScoresEvolution(array $scoresEvolution): static
    {
        $this->scoresEvolution = $scoresEvolution;
        return $this;
    }

    public function getDateAnalyse(): ?\DateTimeInterface
    {
        return $this->dateAnalyse;
    }

    public function setDateAnalyse(\DateTimeInterface $dateAnalyse): static
    {
        $this->dateAnalyse = $dateAnalyse;
        return $this;
    }
}
