<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class CertificationRequest
{
    #[Assert\NotBlank(message: "La spécialité est requise")]
    public ?string $specialite = null;

    #[Assert\NotBlank(message: "Le numéro d'enregistrement est requis")]
    public ?string $numeroEnregistrement = null;

    #[Assert\NotBlank(message: "Veuillez choisir un type de certification")]
    public ?string $type = null;

    #[Assert\NotBlank(message: "Veuillez télécharger votre diplôme")]
    #[Assert\File(
        maxSize: "10M",
        mimeTypes: ["application/pdf", "image/jpeg", "image/png"],
        mimeTypesMessage: "Veuillez télécharger un document valide (PDF, JPG, PNG)"
    )]
    public mixed $diplome = null;

    public ?string $motivation = null;
}