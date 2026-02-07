<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AlimentType extends AbstractType
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
            ->add('typeAliment', TextType::class, [
                'label' => 'Food Type',
                'attr' => [
                    'placeholder' => 'Enter food type...',
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
            ->add('indexGlycemique', IntegerType::class, [
                'label' => 'Glycemic Index',
                'attr' => [
                    'placeholder' => 'Enter glycemic index...',
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
                'label' => 'Is Excitant',
                'required' => false,
                'attr' => [
                    'class' => 'form-checkbox'
                ]
            ])
            ->add('multiScore', NumberType::class, [
                'label' => 'Multi Score',
                'scale' => 1,
                'html5' => true,
                'attr' => [
                    'placeholder' => 'Enter multi score...',
                    'class' => 'form-input'
                ]
            ])
            ->add('repas', EntityType::class, [
                'class' => 'App\\Entity\\Repas',
                'choice_label' => 'titreRepas',
                'label' => 'Associated Meal',
                'required' => true,
                'placeholder' => 'Select a meal',
                'attr' => [
                    'class' => 'form-select'
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