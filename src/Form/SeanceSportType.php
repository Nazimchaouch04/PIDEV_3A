<?php

namespace App\Form;

use App\Entity\SeanceSport;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Type;

class SeanceSportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomSeance', TextType::class, [
                'label' => 'Nom de la seance',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: Course matinale',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le nom de la seance est requis.']),
                    new Length(['min' => 2, 'minMessage' => 'Le nom doit contenir au moins {{ limit }} caracteres.']),
                ],
            ])
            ->add('dateSeance', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'La date est requise.']),
                    new Type(['type' => '\\DateTimeInterface', 'message' => 'La valeur doit être une date valide.']),
                ],
            ])
            ->add('heureDebut', TimeType::class, [
                'label' => 'Heure de debut',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'L\'heure de debut est requise.']),
                    new Type(['type' => '\\DateTimeInterface', 'message' => 'La valeur doit être une heure valide.']),
                ],
            ])
            ->add('dureeMinutes', IntegerType::class, [
                'label' => 'Duree (minutes)',
                'attr' => [
                    'class' => 'form-control',
                    'min' => 5,
                    'step' => 5,
                    'placeholder' => '30',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'La duree est requise.']),
                    new Range(['min' => 5, 'notInRangeMessage' => 'La duree doit être au moins {{ min }} minutes.']),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SeanceSport::class,
        ]);
    }
}
