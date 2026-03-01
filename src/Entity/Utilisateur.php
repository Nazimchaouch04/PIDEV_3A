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
    /** @var int|null */
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
    /** @var array<string> */
    private array $roles = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resetToken = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $resetTokenExpiresAt = null;

    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: ProfilSante::class, cascade: ['persist', 'remove'])]
    private ?ProfilSante $profilSante = null;

    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: Certification::class, cascade: ['persist', 'remove'])]
    private ?Certification $certification = null;

    // ✅ CORRIGÉ : ajout du champ $specialiste manquant (inversedBy: 'utilisateur' dans Specialiste)
    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: Specialiste::class, cascade: ['persist', 'remove'])]
    private ?Specialiste $specialiste = null;

    /**
     * Vecteur d'encodage facial moyen (128 valeurs float) issu de face_recognition.
     * Null si l'utilisateur n'a pas encore configuré le Face ID.
     *
     * @var array<int, float>|null
     */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $faceEncoding = null;

    /**
     * @var Collection<int, Repas>
     */
    #[ORM\OneToMany(targetEntity: Repas::class, mappedBy: 'utilisateur', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $repas;

    /**
     * @var Collection<int, SeanceSport>
     */
    #[ORM\OneToMany(targetEntity: SeanceSport::class, mappedBy: 'utilisateur', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $seancesSport;

    /**
     * @var Collection<int, QuizMental>
     */
    #[ORM\OneToMany(targetEntity: QuizMental::class, mappedBy: 'utilisateur', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $quizMentaux;

    /**
     * @var Collection<int, RendezVous>
     */
    #[ORM\OneToMany(targetEntity: RendezVous::class, mappedBy: 'patient', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $rendezVousPatient;

    /**
     * @var Collection<int, RendezVous>
     */
    // ✅ CORRIGÉ : mappedBy: 'specialiste' pointe vers RendezVous::$specialiste (Utilisateur)
    #[ORM\OneToMany(targetEntity: RendezVous::class, mappedBy: 'specialiste', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $rendezVousSpecialiste;

    /**
     * @var Collection<int, MembreGroupe>
     */
    #[ORM\OneToMany(targetEntity: MembreGroupe::class, mappedBy: 'utilisateur', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $membresGroupes;

    public function __construct()
    {
        $this->dateInscription = new \DateTime();
        $this->roles = ['ROLE_USER'];
        $this->repas = new ArrayCollection();
        $this->seancesSport = new ArrayCollection();
        $this->quizMentaux = new ArrayCollection();
        $this->rendezVousPatient = new ArrayCollection();
        $this->rendezVousSpecialiste = new ArrayCollection();
        $this->membresGroupes = new ArrayCollection();
    }

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

    /**
     * @return array<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    /**
     * @param array<string> $roles
     */
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

    // ✅ CORRIGÉ : getter/setter pour $specialiste ajoutés
    public function getSpecialiste(): ?Specialiste
    {
        return $this->specialiste;
    }

    public function setSpecialiste(?Specialiste $specialiste): static
    {
        if ($specialiste === null && $this->specialiste !== null) {
            $this->specialiste->setUtilisateur(null);
        }
        if ($specialiste !== null && $specialiste->getUtilisateur() !== $this) {
            $specialiste->setUtilisateur($this);
        }
        $this->specialiste = $specialiste;
        return $this;
    }

    /**
     * @return Collection<int, Repas>
     */
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

    /**
     * @return Collection<int, SeanceSport>
     */
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

    /**
     * @return Collection<int, QuizMental>
     */
    public function getQuizMentaux(): Collection
    {
        return $this->quizMentaux;
    }

    /**
     * @return Collection<int, RendezVous>
     */
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

    /**
     * @return Collection<int, RendezVous>
     */
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

    /**
     * @return Collection<int, MembreGroupe>
     */
    public function getMembresGroupes(): Collection
    {
        return $this->membresGroupes;
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
        $names = explode(' ', $this->nomComplet ?? '');
        $initials = '';
        foreach ($names as $name) {
            if (!empty($name)) {
                $initials .= strtoupper(substr($name, 0, 1));
            }
        }
        return $initials;
    }

    /**
     * @return array<int, float>|null
     */
    public function getFaceEncoding(): ?array
    {
        return $this->faceEncoding;
    }

    /**
     * @param array<int, float>|null $faceEncoding
     */
    public function setFaceEncoding(?array $faceEncoding): static
    {
        $this->faceEncoding = $faceEncoding;
        return $this;
    }
}