<?php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserTypeCreate extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('roles', ChoiceType::class, [
                'label' => 'Type de compte',
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                    'Super Administrateur' => 'ROLE_SADMIN',
                ],
                'multiple' => true,
                'expanded' => false,
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => '',
                    'placeholder'=>'Nom de l\'utilisateur',
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Adresse mail',
                'attr' => [
                    'class' => '',
                    'placeholder' => 'Adresse mail',
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'class' => '',
                    'placeholder' => 'Mot de passe',
                ]
            ])
            ->add('avatar', FileType::class, [
                'data_class' => null,
                'required'=>false,
                'label' => 'Avatar',
                'attr' => [
                    'class' => 'col-8',
                ]
            ])
            ->add('hostedDomain', TextType::class, [
                'data_class' => null,
                'required'=>false,
                'label' => 'Nom de domaine',
                'attr' => [
                    'class' => '',
                    'placeholder' => 'Nom de domaine indéfini',
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
