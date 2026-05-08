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
            ->add('titreRepas', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'label' => 'Titre du repas',
                'attr' => ['class' => 'form-control']
            ])
            ->add('typeMoment', ChoiceType::class, [
                'choices' => TypeMoment::cases(),
                'choice_label' => fn(TypeMoment $type) => $type->label(),
                'placeholder' => 'Choisir un moment',
                'attr' => ['class' => 'form-control']
            ])
            ->add('dateConsommation', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Date et heure',
                'attr' => ['class' => 'form-control']
            ])
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