<?php

namespace App\Form;

use App\Entity\Acceuil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AcceuilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('banner_img', TextType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('banner_title', TextType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('banner_text', TextareaType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('desc_vtc_img', TextType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('desc_vtc_title', TextType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('desc_vtc_text', TextareaType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('desc_liv_img', TextType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('desc_liv_title', TextType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('desc_liv_text', TextareaType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Acceuil::class,
        ]);
    }
}
