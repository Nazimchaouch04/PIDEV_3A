<?php

namespace App\Form;

use App\Entity\Aliment;
use App\Entity\Repas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Aliment1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomAliment')
            ->add('calories')
            ->add('indexGlycemique')
            ->add('estExcitant')
            ->add('typeAliment')
            ->add('multiScore')
            ->add('nutriScore')
            ->add('repas', EntityType::class, [
                'class' => Repas::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Aliment::class,
        ]);
    }
}