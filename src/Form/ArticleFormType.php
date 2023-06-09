<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => array(
                    'class' => 'form-control mt-md-3',
                    'placeholder' => 'Input title'
                ),
                'label' => false,
                'required' => false
            ])

            ->add('description', TextType::class, [
                'attr' => array(
                    'class' => 'form-control mt-md-3',
                    'placeholder' => 'Input description'
                ),
                'label' => false,
                'required' => false
            ])

            ->add('text', TextareaType::class, [
                'attr' => array(
                    'class' => 'form-control mt-md-3',
                    'placeholder' => 'Input text'
                ),
                'label' => false,
                'required' => false
            ])

//            ->add('image_path', FileType::class, [
//                'attr' => array(
//                    'class' => 'form-control mt-md-3 py-10',
//                ),
//                'label' => false
//            ])

            ->add('image_path', FileType::class, array(
                'required' => false,
                'mapped' => false,
                'label' => false,
                'attr'=> array('class' => 'form-control mt-md-3 py-10')
            ))

//           ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
