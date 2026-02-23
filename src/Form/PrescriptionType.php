<?php

namespace App\Form;

use App\Entity\Prescription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PrescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomMedicament')
            ->add('dose', NumberType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1
                ]
            ])
            ->add('frequence', NumberType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 24,
                    'step' => 1
                ]
            ])
            ->add('duree', NumberType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 365,
                    'step' => 1
                ]
            ])
            ->add('instructions');
        // consultation REMOVED (will be set automatically)
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prescription::class,
        ]);
    }
}