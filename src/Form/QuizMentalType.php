<?php

namespace App\Form;

use App\Entity\QuizMental;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Range;

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
                'constraints' => [
                    new NotBlank(['message' => 'Le titre est requis.']),
                    new Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le titre doit contenir au moins {{ limit }} caracteres.',
                    ]),
                ],
            ])
            ->add('niveauStressCible', IntegerType::class, [
                'label' => 'Niveau de stress cible (1-10)',
                'attr' => [
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 10,
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le niveau de stress est requis.']),
                    new Range([
                        'min' => 1,
                        'max' => 10,
                        'notInRangeMessage' => 'Le niveau doit être entre {{ min }} et {{ max }}.',
                    ]),
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
