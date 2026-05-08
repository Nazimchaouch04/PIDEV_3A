<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlimentSimpleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomAliment', TextType::class, [
                'label' => 'Food Name',
                'attr' => [
                    'placeholder' => 'Enter food name...',
                    'class' => 'form-input'
                ]
            ])
            ->add('calories', IntegerType::class, [
                'label' => 'Calories',
                'attr' => [
                    'placeholder' => 'Enter calories...',
                    'class' => 'form-input'
                ]
            ])
            ->add('proteines', NumberType::class, [
                'label' => 'Proteins (g)',
                'required' => false,
                'scale' => 1,
                'attr' => [
                    'placeholder' => 'Enter proteins...',
                    'class' => 'form-input'
                ]
            ])
            ->add('glucides', NumberType::class, [
                'label' => 'Carbs (g)',
                'required' => false,
                'scale' => 1,
                'attr' => [
                    'placeholder' => 'Enter carbohydrates...',
                    'class' => 'form-input'
                ]
            ])
            ->add('lipides', NumberType::class, [
                'label' => 'Fats (g)',
                'required' => false,
                'scale' => 1,
                'attr' => [
                    'placeholder' => 'Enter fats...',
                    'class' => 'form-input'
                ]
            ])
            ->add('estExcitant', CheckboxType::class, [
                'label'    => 'Excitant (ex: Café, Thé, RedBull)',
                'required' => false,
                'attr'     => [
                    'class' => 'form-checkbox'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => 'App\\Entity\\Aliment',
        ]);
    }
}