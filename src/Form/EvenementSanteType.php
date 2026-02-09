<?php

namespace App\Form;

use App\Entity\EvenementSante;
use App\Entity\GroupeSoutien;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementSanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreEvent', TextType::class, [
                'label' => 'Titre de l\'événement',
                'attr' => ['class' => 'form-control']
            ])
            ->add('dateEvent', DateTimeType::class, [
                'label' => 'Date et Heure',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
            ])
            ->add('pointsParticipation', IntegerType::class, [
                'label' => 'Points bonus',
                'attr' => ['class' => 'form-control']
            ])
            ->add('groupe', EntityType::class, [
                'class' => GroupeSoutien::class,
                'choice_label' => 'nomGroupe',
                'label' => 'Groupe associé',
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EvenementSante::class,
        ]);
    }
}