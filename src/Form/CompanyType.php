<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
                TextType::class,
                [
                    'label'=>'Название',
                    'attr' => [
                        'class' => 'form-control'
                    ]                
                ]
            )
            ->add('site',
                TextType::class,
                [
                    'label'=>'Название',
                    'attr' => [
                        'class' => 'form-control'
                    ]                
                ]
            )
            ->add('address',
                TextType::class,
                [
                    'label'=>'Название',
                    'attr' => [
                        'class' => 'form-control'
                    ]                
                ]
            )
            ->add('phone',
                TextType::class,
                [
                    'label'=>'Название',
                    'attr' => [
                        'class' => 'form-control'
                    ]                
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
