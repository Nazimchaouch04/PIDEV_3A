<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

class AdminUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomComplet', TextType::class, [
                'label' => 'Nom complet',
                'attr' => [
                    'placeholder' => 'Ex: Jean Dupont',
                    'novalidate' => 'novalidate'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le nom complet est requis']),
                    new Assert\Length([
                        'min' => 2,
                        'max' => 100,
                        'minMessage' => 'Le nom doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères'
                    ]),
                    new Assert\Regex([
                        'pattern' => '/^[a-zA-ZÀ-ÿ\s\-]+$/',
                        'message' => 'Le nom ne peut contenir que des lettres, des espaces et des tirets (pas de chiffres)'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'attr' => [
                    'placeholder' => 'exemple@email.com',
                    'novalidate' => 'novalidate'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'L\'adresse email est requise']),
                    new Assert\Email(['message' => 'L\'adresse email "{{ value }}" n\'est pas valide'])
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôles',
                'multiple' => true,
                'expanded' => true,
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Coach' => 'ROLE_COACH',
                    'Spécialiste' => 'ROLE_SPECIALISTE',
                    'Administrateur' => 'ROLE_ADMIN',
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Au moins un rôle doit être sélectionné'])
                ]
            ]);

        // Ajouter le champ mot de passe uniquement pour la création
        if ($options['include_password']) {
            $builder->add('plainPassword', PasswordType::class, [
                'label' => 'Mot de passe',
                'mapped' => false,
                'attr' => [
                    'placeholder' => '••••••••',
                    'novalidate' => 'novalidate'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le mot de passe est requis']),
                    new Assert\Length([
                        'min' => 6,
                        'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères'
                    ]),
                    new Assert\Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
                        'message' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre'
                    ])
                ]
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
            'include_password' => false,
            'attr' => ['novalidate' => 'novalidate'],
            'constraints' => [
                new UniqueEntity([
                    'fields' => ['email'],
                    'message' => 'Cette adresse email est déjà utilisée.'
                ])
            ]
        ]);
    }
}
