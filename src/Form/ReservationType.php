<?php

namespace App\Form;

use App\Entity\Offre;
use App\Entity\Reservation;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('IDPost', EntityType::class, [
                'class' => Offre::class,
'choice_label' => 'IDPost',
            ])
            ->add('IDUser', EntityType::class, [
                'class' => user::class,
'choice_label' => 'IDUser',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
