<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
#[ORM\Table(name: 'question')]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /** @var int|null */
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'L\'enonce de la question est requis')]
    private ?string $enonce = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'La reponse correcte est requise')]
    private ?string $reponseCorrecte = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Les options fausses sont requises')]
    private ?string $optionsFausses = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Les points sont requis')]
    #[Assert\Positive(message: 'Les points doivent etre positifs')]
    private ?int $pointsValeur = null;

    #[ORM\ManyToOne(inversedBy: 'questions')]
    // ✅ CORRIGÉ : ajout onDelete CASCADE pour cohérence ORM/DB
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?QuizMental $quiz = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnonce(): ?string
    {
        return $this->enonce;
    }

    public function setEnonce(string $enonce): static
    {
        $this->enonce = $enonce;
        return $this;
    }

    public function getReponseCorrecte(): ?string
    {
        return $this->reponseCorrecte;
    }

    public function setReponseCorrecte(string $reponseCorrecte): static
    {
        $this->reponseCorrecte = $reponseCorrecte;
        return $this;
    }

    public function getOptionsFausses(): ?string
    {
        return $this->optionsFausses;
    }

    public function setOptionsFausses(string $optionsFausses): static
    {
        $this->optionsFausses = $optionsFausses;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getOptionsFaussesArray(): array
    {
        return explode('|', $this->optionsFausses ?? '');
    }

    /**
     * @param array<string> $options
     */
    public function setOptionsFaussesFromArray(array $options): static
    {
        $this->optionsFausses = implode('|', $options);
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getAllOptions(): array
    {
        $options = $this->getOptionsFaussesArray();
        $options[] = $this->reponseCorrecte;
        shuffle($options);
        return $options;
    }

    public function getPointsValeur(): ?int
    {
        return $this->pointsValeur;
    }

    public function setPointsValeur(int $pointsValeur): static
    {
        $this->pointsValeur = $pointsValeur;
        return $this;
    }

    public function getQuiz(): ?QuizMental
    {
        return $this->quiz;
    }

    public function setQuiz(?QuizMental $quiz): static
    {
        $this->quiz = $quiz;
        return $this;
    }
}