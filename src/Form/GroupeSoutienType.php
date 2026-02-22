<?php

namespace App\Form;

use App\Entity\GroupeSoutien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupeSoutienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomGroupe', TextType::class, [
                'label' => 'Nom du Groupe',
                'attr' => ['class' => 'form-control', 'placeholder' => 'ex: Yoga Morning']
            ])
            ->add('thematique', TextType::class, [
                'label' => 'Thématique',
                'attr' => ['class' => 'form-control', 'placeholder' => 'ex: Fitness']
            ])
            ->add('capaciteMax', IntegerType::class, [
                'label' => 'Capacité Max',
                'attr' => ['class' => 'form-control', 'min' => 1, 'max' => 20]
            ])
            ->add('image', TextType::class, [
                'label' => 'URL de l\'image',
                'attr' => ['class' => 'form-control', 'placeholder' => 'Paste an image URL here']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'form-control', 'rows' => 3]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GroupeSoutien::class,
        ]);
    }
}