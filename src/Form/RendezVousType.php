<?php

namespace App\Form;

use App\Entity\RendezVous;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('specialiste', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'nomComplet',
                'label' => 'Spécialiste',
            ])

            ->add('dateHeure', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Date et heure',
            ])

            ->add('motif', TextareaType::class, [
                'label' => 'Motif',
            ])

            ->add('mode', ChoiceType::class, [
                'choices' => [
                    'Présentiel' => 'PRESENTIEL',
                    'Téléconsultation' => 'TELECONSULTATION',
                ],
                'expanded' => true,   
                'multiple' => false,
                'label' => 'Mode de consultation',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
