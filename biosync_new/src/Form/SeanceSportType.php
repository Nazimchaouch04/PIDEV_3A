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
            ])
            ->add('dateSeance', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('heureDebut', TimeType::class, [
                'label' => 'Heure de debut',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('dureeMinutes', IntegerType::class, [
                'label' => 'Duree (minutes)',
                'attr' => [
                    'class' => 'form-control',
                    'min' => 5,
                    'step' => 5,
                    'placeholder' => '30',
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
