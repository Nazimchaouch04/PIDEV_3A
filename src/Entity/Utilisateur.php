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
    #[Assert\Regex(
        pattern: '/^[a-zA-ZÀ-ÿ\s\-]+$/',
        message: 'Le nom ne peut contenir que des lettres, des espaces et des tirets'
    )]
    #[Assert\Regex(
        pattern: '/^[a-zA-ZÀ-ÿ]/',
        message: 'Le nom doit commencer par une lettre'
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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resetToken = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $resetTokenExpiresAt = null;

    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: ProfilSante::class, cascade: ['persist', 'remove'])]
    private ?ProfilSante $profilSante = null;

    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: Certification::class, cascade: ['persist', 'remove'])]
    private ?Certification $certification = null;

    /**
     * Vecteur d'encodage facial moyen (128 valeurs float) issu de face_recognition.
     * Null si l'utilisateur n'a pas encore configuré le Face ID.
     */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $faceEncoding = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

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
     * Collection des quiz mentaux passés par l'utilisateur
     * Relation OneToMany : un utilisateur peut passer plusieurs quiz mentaux
     */
    #[ORM\OneToMany(targetEntity: QuizMental::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $quizMentaux;

    /**
     * @var Collection<int, RendezVous>
     * Collection des rendez-vous médicaux de l'utilisateur (comme patient)
     * Relation OneToMany : un utilisateur peut avoir plusieurs rendez-vous
     */
    #[ORM\OneToMany(targetEntity: RendezVous::class, mappedBy: 'patient', orphanRemoval: true)]
    private Collection $rendezVousPatient;

    /**
     * @var Collection<int, RendezVous>
     * Collection des rendez-vous médicaux de l'utilisateur (comme spécialiste)
     * Relation OneToMany : un spécialiste peut avoir plusieurs rendez-vous
     */
    #[ORM\OneToMany(targetEntity: RendezVous::class, mappedBy: 'specialiste', orphanRemoval: true)]
    private Collection $rendezVousSpecialiste;

    /**
     * @var Collection<int, MembreGroupe>
     * Collection des groupes de soutien auxquels l'utilisateur est inscrit
     * Relation OneToMany : un utilisateur peut rejoindre plusieurs groupes
     */
    /**
     * @var Collection<int, CognitiveInsight>
     */
    #[ORM\OneToMany(targetEntity: CognitiveInsight::class, mappedBy: 'utilisateur', orphanRemoval: true)]
    private Collection $cognitiveInsights;

    /**
     * Constructeur de l'entité Utilisateur
     * Initialise les valeurs par défaut et les collections vides
     */
    public function __construct()
    {
        $this->dateInscription = new \DateTime();  // Date d'inscription automatique
        $this->roles = ['ROLE_USER'];              // Rôle par défaut
        $this->repas = new ArrayCollection();           // Initialisation collection repas
        $this->seancesSport = new ArrayCollection();     // Initialisation collection séances sport
        $this->quizMentaux = new ArrayCollection();   // Initialisation collection quiz mentaux
        $this->rendezVousPatient = new ArrayCollection();     // Initialisation collection rendez-vous patient
        $this->rendezVousSpecialiste = new ArrayCollection();  // Initialisation collection rendez-vous spécialiste
        $this->membresGroupes = new ArrayCollection();  // Initialisation collection groupes
        $this->cognitiveInsights = new ArrayCollection();
    }

    // =========================================================================
    // SECTION : GETTERS ET SETTERS
    // =========================================================================

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
    public function getRendezVousPatient(): Collection
    {
        return $this->rendezVousPatient;
    }
    
    public function addRendezVousPatient(RendezVous $rendezVous): static
    {
        if (!$this->rendezVousPatient->contains($rendezVous)) {
            $this->rendezVousPatient->add($rendezVous);
            $rendezVous->setPatient($this);
        }
        return $this;
    }
    
    public function removeRendezVousPatient(RendezVous $rendezVous): static
    {
        if ($this->rendezVousPatient->removeElement($rendezVous)) {
            if ($rendezVous->getPatient() === $this) {
                $rendezVous->setPatient(null);
            }
        }
        return $this;
    }

    public function getRendezVousSpecialiste(): Collection
    {
        return $this->rendezVousSpecialiste;
    }
    
    public function addRendezVousSpecialiste(RendezVous $rendezVous): static
    {
        if (!$this->rendezVousSpecialiste->contains($rendezVous)) {
            $this->rendezVousSpecialiste->add($rendezVous);
            $rendezVous->setSpecialiste($this);
        }
        return $this;
    }
    
    public function removeRendezVousSpecialiste(RendezVous $rendezVous): static
    {
        if ($this->rendezVousSpecialiste->removeElement($rendezVous)) {
            if ($rendezVous->getSpecialiste() === $this) {
                $rendezVous->setSpecialiste(null);
            }
        }
        return $this;
    }

    public function getMembresGroupes(): Collection
    {
        return $this->membresGroupes;
    }

    /**
     * @return Collection<int, CognitiveInsight>
     */
    public function getCognitiveInsights(): Collection
    {
        return $this->cognitiveInsights;
    }

    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    public function setResetToken(?string $resetToken): static
    {
        $this->resetToken = $resetToken;
        return $this;
    }

    public function getResetTokenExpiresAt(): ?\DateTimeInterface
    {
        return $this->resetTokenExpiresAt;
    }

    public function setResetTokenExpiresAt(?\DateTimeInterface $resetTokenExpiresAt): static
    {
        $this->resetTokenExpiresAt = $resetTokenExpiresAt;
        return $this;
    }

    public function getInitials(): string
    {
        $names = explode(' ', $this->nomComplet);
        $initials = '';
        
        foreach ($names as $name) {
            if (!empty($name)) {
                $initials .= strtoupper(substr($name, 0, 1));
            }
        }
        
        return $initials;
    }

    public function getFaceEncoding(): ?array
    {
        return $this->faceEncoding;
    }

    public function setFaceEncoding(?array $faceEncoding): static
    {
        $this->faceEncoding = $faceEncoding;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;
        return $this;
    }
}
