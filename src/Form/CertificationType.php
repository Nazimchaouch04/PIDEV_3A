<?php

namespace App\Form;

use App\Entity\Certification;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CertificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'Type de certification',
                'choices' => [
                    'Devenir Coach' => 'COACH',
                    'Devenir Spécialiste' => 'SPECIALISTE',
                ],
                'expanded' => true, // Affiche des boutons radio
                'multiple' => false,
                'required' => false, // Validation gérée par Symfony (DTO)
                'attr' => ['class' => 'gap-4'], // Classe CSS optionnelle pour l'espacement
            ])
            ->add('specialite', TextType::class, [
                'required' => false,
                'label' => 'Spécialité'
            ])
            ->add('numeroEnregistrement', TextType::class, [
                'required' => false,
                'label' => 'Numéro d\'enregistrement professionnel'
            ])
            ->add('motivation', TextareaType::class, [
                'required' => true,
                'label' => 'Motivation',
                'attr' => [
                    'placeholder' => 'Expliquez pourquoi vous souhaitez devenir certifié et quelles sont vos compétences...',
                    'rows' => 4
                ]
            ])
            ->add('diplomeFilename', FileType::class, [
                'required' => false,
                'label' => 'Diplôme ou certificat (PDF, JPG, PNG)',
                'mapped' => false // Ne pas mapper directement à l'entité
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Certification::class,
            'attr' => ['novalidate' => 'novalidate'] // Désactive HTML5 validation
        ]);
    }
}
