<?php

namespace App\Form;

use App\Entity\ProfilSante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class ProfilSanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('age', IntegerType::class, [
                'label' => 'Age',
                'attr' => [
                    'class' => 'form-control',
                    'min' => 15,
                    'max' => 100,
                ],
                'constraints' => [
                    new NotBlank(['message' => 'L\'age est requis.']),
                    new Range(['min' => 15, 'max' => 100, 'notInRangeMessage' => 'L\'age doit être entre {{ min }} et {{ max }}.']),
                ],
            ])
            ->add('poids', NumberType::class, [
                'label' => 'Poids (kg)',
                'attr' => [
                    'class' => 'form-control',
                    'step' => '0.1',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le poids est requis.']),
                    new Range(['min' => 20, 'max' => 500, 'notInRangeMessage' => 'Le poids doit être entre {{ min }} et {{ max }} kg.']),
                ],
            ])
            ->add('heureReveil', TimeType::class, [
                'label' => 'Heure de reveil habituelle',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'constraints' => [
                    new NotBlank(['message' => 'L\'heure de reveil est requise.']),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilSante::class,
        ]);
    }
}
