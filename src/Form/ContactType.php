<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "name",
                    "type" => "text",
                    "placeholder" => "Votre nom *",
                    "data-sb-validations" => "required",
                ]
            ])
            ->add('email', null, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "email",
                    "type" => "email",
                    "placeholder" => "Votre Email *",
                    "data-sb-validations"=> "required,email",
                ]
            ])
            ->add('phone', null, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "phone",
                    "type" => "tel",
                    "placeholder" => "Votre téléphone *",
                    "data-sb-validations" => "required",
                ]
            ])
            ->add('message', null, [
                "attr" => [
                    "class" => "form-control",
                    "id" => "name",
                    "placeholder" => "Votre message *",
                    "data-sb-validations" => "required",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
