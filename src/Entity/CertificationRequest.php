<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class CertificationRequest
{
    #[Assert\NotBlank(message: "La spécialité est requise")]
    public $specialite;

    #[Assert\NotBlank(message: "Le numéro d'enregistrement est requis")]
    public $numeroEnregistrement;

    #[Assert\NotBlank(message: "Veuillez choisir un type de certification")]
    public $type;

    #[Assert\NotBlank(message: "Veuillez télécharger votre diplôme")]
    #[Assert\File(
        maxSize: "10M",
        mimeTypes: ["application/pdf", "image/jpeg", "image/png"],
        mimeTypesMessage: "Veuillez télécharger un document valide (PDF, JPG, PNG)"
    )]
    public $diplome;

    public $motivation;
}
