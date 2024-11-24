<?php

namespace App\Form;

use App\Entity\continent;
use App\Entity\Country;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NameCountry')
            ->add('DescriptionCountry')
            ->add('IDContinent', EntityType::class, [
                'class' => continent::class,
'choice_label' => 'IDContinent',
            ])
            ->add('users', EntityType::class, [
                'class' => User::class,
'choice_label' => 'users',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Country::class,
        ]);
    }
}
