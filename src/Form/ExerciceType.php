<?php

namespace App\Form;

use App\Entity\Exercice;
use App\Entity\SeanceSport;
use App\Enum\Intensite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;

class ExerciceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomExercice', null, [
                'label' => "Nom de l'exercice",
                'attr' => ['class' => 'form-control rounded-pill'],
                'constraints' => [
                    new NotBlank(['message' => "Le nom de l'exercice est requis."]),
                ],
            ])
            ->add('intensite', EnumType::class, [
                'class' => Intensite::class,
                'label' => "Intensité de l'effort",
                'placeholder' => "Choisissez une intensité",
                'attr' => ['class' => 'form-select rounded-pill'],
                'constraints' => [
                    new NotNull(['message' => "Veuillez choisir une intensité."]),
                ],
            ])
            ->add('caloriesParMinute', null, [
                'label' => "Calories par minute",
                'attr' => ['class' => 'form-control rounded-pill'],
                'constraints' => [
                    new NotNull(['message' => "Les calories par minute sont requises."]),
                ],
            ])
            ->add('seance', EntityType::class, [
                'class' => SeanceSport::class,
                'choice_label' => 'nomSeance',
                'label' => "Séance associée",
                'placeholder' => "Sélectionnez une séance",
                'attr' => ['class' => 'form-select rounded-pill'],
                'constraints' => [
                    new NotNull(['message' => "Veuillez sélectionner une séance."]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Exercice::class,
        ]);
    }
}