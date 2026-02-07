<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: 'utilisateur')]
#[UniqueEntity(fields: ['email'], message: 'Un compte existe déjà avec cet email')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Le nom complet est requis')]
    #[Assert\Length(
        min: 2,
        max: 100,
        minMessage: 'Le nom doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères'
    )]
    private ?string $nomComplet = null;

    #[ORM\Column(length: 100, unique: true)]
    #[Assert\NotBlank(message: 'L\'adresse email est requise')]
    #[Assert\Email(message: 'L\'adresse email "{{ value }}" n\'est pas valide')]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasse = null;

    #[ORM\Column]
    private int $scoreGlobal = 0;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(type: Types::JSON)]
    private array $roles = [];

    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: ProfilSante::class, cascade: ['persist', 'remove'])]
    private ?ProfilSante $profilSante = null;

    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: Certification::class, cascade: ['persist', 'remove'])]
    private ?Certification $certification = null;

    /**
     * @var Collection<int, Repas>
     */
    #[ORM\OneToMany(targetEntity: Repas::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $repas;

    /**
     * @var Collection<int, SeanceSport>
     */
    #[ORM\OneToMany(targetEntity: SeanceSport::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $seancesSport;

    /**
     * @var Collection<int, QuizMental>
     */
    #[ORM\OneToMany(targetEntity: QuizMental::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $quizMentaux;

    /**
     * @var Collection<int, RendezVous>
     */
    #[ORM\OneToMany(targetEntity: RendezVous::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $rendezVous;

    /**
     * @var Collection<int, MembreGroupe>
     */
    #[ORM\OneToMany(targetEntity: MembreGroupe::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $membresGroupes;

    public function __construct()
    {
        $this->dateInscription = new \DateTime();
        $this->roles = ['ROLE_USER'];
        $this->repas = new ArrayCollection();
        $this->seancesSport = new ArrayCollection();
        $this->quizMentaux = new ArrayCollection();
        $this->rendezVous = new ArrayCollection();
        $this->membresGroupes = new ArrayCollection();
    }

    // --- GETTERS ET SETTERS ---

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): static
    {
        $this->nomComplet = $nomComplet;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->motDePasse;
    }

    public function getScoreGlobal(): int
    {
        return $this->scoreGlobal;
    }

    public function setScoreGlobal(int $scoreGlobal): static
    {
        $this->scoreGlobal = $scoreGlobal;
        return $this;
    }

    public function addScore(int $points): static
    {
        $this->scoreGlobal += $points;
        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): static
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function eraseCredentials(): void {}

    public function getProfilSante(): ?ProfilSante
    {
        return $this->profilSante;
    }

    public function setProfilSante(?ProfilSante $profilSante): static
    {
        if ($profilSante === null && $this->profilSante !== null) {
            $this->profilSante->setUtilisateur(null);
        }

        if ($profilSante !== null && $profilSante->getUtilisateur() !== $this) {
            $profilSante->setUtilisateur($this);
        }

        $this->profilSante = $profilSante;
        return $this;
    }

    public function getCertification(): ?Certification
    {
        return $this->certification;
    }

    public function setCertification(?Certification $certification): static
    {
        if ($certification === null && $this->certification !== null) {
            $this->certification->setUtilisateur(null);
        }

        if ($certification !== null && $certification->getUtilisateur() !== $this) {
            $certification->setUtilisateur($this);
        }

        $this->certification = $certification;
        return $this;
    }

    // --- COLLECTIONS ---

    public function getRepas(): Collection
    {
        return $this->repas;
    }
    public function addRepas(Repas $repas): static
    {
        if (!$this->repas->contains($repas)) {
            $this->repas->add($repas);
            $repas->setUtilisateur($this);
        }
        return $this;
    }
    public function removeRepas(Repas $repas): static
    {
        if ($this->repas->removeElement($repas)) {
            if ($repas->getUtilisateur() === $this) {
                $repas->setUtilisateur(null);
            }
        }
        return $this;
    }

    public function getSeancesSport(): Collection
    {
        return $this->seancesSport;
    }
    public function addSeanceSport(SeanceSport $seanceSport): static
    {
        if (!$this->seancesSport->contains($seanceSport)) {
            $this->seancesSport->add($seanceSport);
            $seanceSport->setUtilisateur($this);
        }
        return $this;
    }

    public function getQuizMentaux(): Collection
    {
        return $this->quizMentaux;
    }
    public function getRendezVous(): Collection
    {
        return $this->rendezVous;
    }
    public function getMembresGroupes(): Collection
    {
        return $this->membresGroupes;
    }

    public function getInitials(): string
    {
        $parts = explode(' ', $this->nomComplet ?? '');
        $initials = '';
        foreach ($parts as $part) {
            if (!empty($part)) {
                $initials .= strtoupper($part[0]);
            }
        }
        return substr($initials, 0, 2);
    }
}
