<?php

namespace App\Form;

use App\Entity\Country; 
use App\Entity\Event;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Positive;


class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NameEvent', null, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z\s]+$/',
                        'message' => 'Le champ ne doit contenir que des lettres et des espaces.',
                    ]),
                ],
            ])
            ->add('descriptionevent', null, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z\s]+$/',
                        'message' => 'Le champ ne doit contenir que des lettres et des espaces.',
                    ]),
                ],
            ])
            ->add('datestartevent', DateTimeType::class, [ 
                'widget' => 'single_text', 
                'html5' => false, 
                'format' => 'MM-dd-yyyy', 
                'attr' => ['class' => 'datepicker']
            ])
            ->add('dateendevent', DateTimeType::class, [ 
                'widget' => 'single_text', 
                'html5' => false, 
                'format' => 'MM-dd-yyyy', 
                'attr' => ['class' => 'datepicker']
            ])
            ->add('locationevent')
            ->add('idorganiser', null, [
                'constraints' => [
                    new Positive([
                        'message' => 'Le id doit être un nombre positif.',
                    ]),
                ],
            ])
            ->add('nbattendees', null, [
                'constraints' => [
                    new Positive([
                        'message' => 'Le nombre doit être un nombre positif.',
                    ]),
                ],
            ])
            ->add('idcountry', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'idcountry',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}




