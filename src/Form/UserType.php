<?php

namespace App\Form;

use App\Entity\country;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName')
            ->add('LastName')
            ->add('PhoneNumber')
            ->add('Username')
            ->add('Email')
            ->add('Password')
            ->add('DOB')
            ->add('Address')
            ->add('IDCountry', EntityType::class, [
                'class' => country::class,
'choice_label' => 'IDCountry',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
