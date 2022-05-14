<?php

namespace App\Form;

use App\Entity\Vtc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VtcType extends AbstractType
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
            ->add('desc_img', TextType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('desc_title', TextType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
            ->add('desc_text', TextareaType::class, [
                "attr" =>[
                    "class" =>"form-control"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vtc::class,
        ]);
    }
}
