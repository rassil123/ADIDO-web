<?php

namespace App\Form;

use App\Entity\Blog;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('TitleBlog')
            ->add('ContentBlog')
            ->add('LikesBlog')
            ->add('Categorie')
            ->add('IDCountry')
            ->add('IDUser', EntityType::class, [
                'class' => user::class,
'choice_label' => 'IDUser',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Blog::class,
        ]);
    }
}