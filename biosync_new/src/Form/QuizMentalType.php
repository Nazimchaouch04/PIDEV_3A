<?php

namespace App\Form;

use App\Entity\QuizMental;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizMentalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre du quiz',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: Evaluation stress quotidien',
                ],
            ])
            ->add('niveauStressCible', IntegerType::class, [
                'label' => 'Niveau de stress cible (1-10)',
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 10,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => QuizMental::class,
        ]);
    }
}
