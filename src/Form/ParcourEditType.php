<?php

namespace App\Form;

use DateTime;
use App\Entity\Parcour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ParcourEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text', // Utilise un champ de texte unique pour la date
                'input'  => 'datetime',   // Permet à Symfony de gérer le format DateTime en interne
                'attr'   => [
                    'class' => 'form-control',
                ],
            ])
            ->add('title', null, [
                'label' => 'Prix',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('description', null, [
                'label' => 'Prix',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('img', FileType::class, [
                'required' => false,
                'data_class' => null, 
                'mapped' => false,
                'label' => 'Image',
                'constraints' => [
                    new File([
                        'maxSize' => '20M',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Envoyez une image correcte svp.',
                    ])
                ],
                'attr' => [
                    'class' => 'form-control',
                    'type' => 'file',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parcour::class,
        ]);
    }
}
