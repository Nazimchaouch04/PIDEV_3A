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
                'label' => 'Âge',
                'required' => false, // Désactive le 'required' HTML5
                'attr' => [
                    'class' => 'form-control',
                    'novalidate' => 'novalidate', // Indique au navigateur de ne pas valider
                ],
            ])
            ->add('poids', NumberType::class, [
                'label' => 'Poids (kg)',
                'required' => false, // Désactive le 'required' HTML5
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('heureReveil', TimeType::class, [
                'label' => 'Heure de réveil habituelle',
                'widget' => 'single_text',
                'required' => false, // Désactive le 'required' HTML5
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilSante::class,
            // Optionnel : Désactive la validation HTML5 sur tout le formulaire
            'attr' => ['novalidate' => 'novalidate']
        ]);
    }
}
