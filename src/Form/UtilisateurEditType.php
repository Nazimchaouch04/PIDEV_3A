<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomComplet', TextType::class, [
                'label' => 'Nom complet',
                'required' => false, // Désactive le 'required' automatique de Symfony en HTML5
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: Jean Dupont'
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'required' => false, // Désactive la validation HTML5 "required"
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: jean.dupont@email.com'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
            // Ajoute l'attribut novalidate à la balise <form> pour bloquer toute vérification du navigateur
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
