<?php

namespace App\Form;

use App\Entity\Offre;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('IDCountry')
            ->add('PrixPost')
            ->add('DescriptionPost')
            ->add('LikesPost')
            ->add('PhotoPost')
            ->add('DateDebut')
            ->add('DateFin')
            ->add('IDUser', EntityType::class, [
                'class' => user::class,
'choice_label' => 'IDUser',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
