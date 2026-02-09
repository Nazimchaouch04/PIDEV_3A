<?php

namespace App\Form;

use App\Entity\Repas;
use App\Enum\TypeMoment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Type;

class RepasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreRepas', TextType::class, [
                'label' => 'Titre du repas',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: Petit-dejeuner equilibre',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le titre du repas est requis.']),
                    new Length(['min' => 2, 'minMessage' => 'Le titre doit contenir au moins {{ limit }} caracteres.']),
                ],
            ])
            ->add('typeMoment', EnumType::class, [
                'class' => TypeMoment::class,
                'label' => 'Moment de la journee',
                'attr' => ['class' => 'form-control'],
                'choice_label' => fn(TypeMoment $choice) => $choice->label(),
            ])
            ->add('dateConsommation', DateTimeType::class, [
                'label' => 'Date et heure',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'La date de consommation est requise.']),
                    new Type(['type' => '\\DateTimeInterface', 'message' => 'La valeur doit être une date valide.']),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Repas::class,
        ]);
    }
}
