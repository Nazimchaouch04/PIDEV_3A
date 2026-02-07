<?php

namespace App\Form;

use App\Entity\Repas;
use App\Entity\Utilisateur;
use App\Enum\TypeMoment;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Repas1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreRepas')
            ->add('typeMoment', ChoiceType::class, [
                'choices' => TypeMoment::cases(),
                'choice_label' => fn(TypeMoment $type) => $type->label(),
                'placeholder' => 'Choisir un moment',
            ])
            ->add('dateConsommation')
            ->add('utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'id',
                'attr' => ['style' => 'display: none;'],
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Repas::class,
        ]);
    }
}