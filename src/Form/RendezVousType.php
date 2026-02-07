<?php

namespace App\Form;

use App\Entity\RendezVous;
use App\Entity\Specialiste;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Type;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('specialiste', EntityType::class, [
                'class' => Specialiste::class,
                'choice_label' => fn(Specialiste $s) => 'Dr. ' . $s->getNomDocteur() . ' - ' . $s->getSpecialite(),
                'label' => 'Specialiste',
                'attr' => ['class' => 'form-control'],
                'placeholder' => 'Selectionnez un specialiste',
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez selectionner un specialiste.']),
                ],
            ])
            ->add('dateHeureRdv', DateTimeType::class, [
                'label' => 'Date et heure du rendez-vous',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'La date et l\'heure sont requises.']),
                    new Type(['type' => '\\DateTimeInterface', 'message' => 'La valeur doit être une date valide.']),
                ],
            ])
            ->add('motif', TextareaType::class, [
                'label' => 'Motif de la consultation',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                    'placeholder' => 'Decrivez le motif de votre rendez-vous...',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le motif est requis.']),
                    new Length(['min' => 10, 'minMessage' => 'Le motif doit contenir au moins {{ limit }} caracteres.']),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
