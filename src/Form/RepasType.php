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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Repas::class,
        ]);
    }
}