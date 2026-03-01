<?php

namespace App\Entity;

use App\Repository\QuizMentalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: QuizMentalRepository::class)]
#[ORM\Table(name: 'quiz_mental')]
class QuizMental
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /** @var int|null */
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le titre du quiz est requis')]
    #[Assert\Length(max: 100)]
    private ?string $titre = null;

    #[ORM\Column]
    #[Assert\Range(min: 1, max: 10, notInRangeMessage: 'Le niveau de stress cible doit etre entre {{ min }} et {{ max }}')]
    private ?int $niveauStressCible = null;

    #[ORM\Column]
    private int $scoreResultat = 0;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $medailleQuiz = null;

    // ✅ CORRIGÉ : DateTime → DateTimeImmutable
    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $dateQuiz = null;

    #[ORM\Column(length: 20, options: ['default' => 'disponible'])]
    private string $statut = 'disponible';

    #[ORM\ManyToOne(inversedBy: 'quizMentaux')]
    // ✅ CORRIGÉ : ajout onDelete CASCADE pour cohérence ORM/DB
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateur = null;

    /**
     * @var Collection<int, Question>
     */
    // ✅ CORRIGÉ : ajout cascade='remove' pour cohérence ORM/DB
    #[ORM\OneToMany(targetEntity: Question::class, mappedBy: 'quiz', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        // ✅ CORRIGÉ : DateTimeImmutable
        $this->dateQuiz = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;
        return $this;
    }

    public function getNiveauStressCible(): ?int
    {
        return $this->niveauStressCible;
    }

    public function setNiveauStressCible(int $niveauStressCible): static
    {
        $this->niveauStressCible = $niveauStressCible;
        return $this;
    }

    public function getScoreResultat(): int
    {
        return $this->scoreResultat;
    }

    public function setScoreResultat(int $scoreResultat): static
    {
        $this->scoreResultat = $scoreResultat;
        return $this;
    }

    public function getMedailleQuiz(): ?string
    {
        return $this->medailleQuiz;
    }

    public function setMedailleQuiz(?string $medailleQuiz): static
    {
        $this->medailleQuiz = $medailleQuiz;
        return $this;
    }

    public function getDateQuiz(): ?\DateTimeImmutable
    {
        return $this->dateQuiz;
    }

    // ✅ CORRIGÉ : setter accepte DateTimeImmutable
    public function setDateQuiz(\DateTimeImmutable $dateQuiz): static
    {
        $this->dateQuiz = $dateQuiz;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;
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
     * @return Collection<int, Question>
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): static
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->setQuiz($this);
        }
        return $this;
    }

    public function removeQuestion(Question $question): static
    {
        if ($this->questions->removeElement($question)) {
            if ($question->getQuiz() === $this) {
                $question->setQuiz(null);
            }
        }
        return $this;
    }

    public function getTotalPoints(): int
    {
        $total = 0;
        foreach ($this->questions as $question) {
            $total += $question->getPointsValeur();
        }
        return $total;
    }
}