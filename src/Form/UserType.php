<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('roles', ChoiceType::class, [
                'label' => 'Type de compte',
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])

            ->add('email', TextType::class, [
                'label' => 'Adresse mail',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
//            ->add('roles')
            ->add('googleId', TextType::class, [
                'label' => 'Identifiant social',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('avatar', FileType::class, [
                'label'=>'Avatar',
                'attr'=>[
                    'class' => 'form-control',
                ]
            ])
            ->add('hostedDomain', TextType::class, [
                'label'=>'Nom de domaine',
                'attr'=>[
                    'class' => '',
                ]
            ]);
//            ->add('password')
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
