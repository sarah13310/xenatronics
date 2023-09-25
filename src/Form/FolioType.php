<?php

namespace App\Form;

use App\Entity\Folio;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class FolioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control mt-1 ',
                    'id' => 'folioName',
                    'name' => 'folioName',
                    'placeholder' => 'Votre nom'
                ],
            ])
            ->add('link', TextType::class,[
                'label'=>'Lien',
                'attr' => [
                    'class' => 'form-control mt-1 ',
                    'id' => 'folioLink',
                    'placeholder' => 'Lien (url) ex: htpp://....'
                ],
            ])
            ->add('icon', FileType::class,[
                'label'=>"Image",
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control mt-1 ',
                    'id' => 'folioImage',
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Folio::class,
        ]);
    }
}
