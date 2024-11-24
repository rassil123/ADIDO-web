<?php

namespace App\Form;

use App\Entity\blog;
use App\Entity\Comments;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('LikesComment')
            ->add('ContentComment')
            ->add('DateComment')
            ->add('IDBlog', EntityType::class, [
                'class' => blog::class,
'choice_label' => 'IDBlog',
            ])
            ->add('comments', EntityType::class, [
                'class' => Comments::class,
'choice_label' => 'comments',
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
            'data_class' => Comments::class,
        ]);
    }
}
