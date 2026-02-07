<?php

namespace App\Form;

use App\Entity\ProfilSante;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ])
            ->add('poids', NumberType::class, [
                'label' => 'Poids (kg)',
                'attr' => [
                    'class' => 'form-control',
                    'step' => '0.1',
                ],
            ])
            ->add('heureReveil', TimeType::class, [
                'label' => 'Heure de reveil habituelle',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilSante::class,
        ]);
    }
}
