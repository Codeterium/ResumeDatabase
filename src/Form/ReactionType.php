<?php

namespace App\Form;

use App\Entity\Reaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use App\Entity\Company;
use App\Entity\Rezume;



class ReactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company', 
                EntityType::class, 
                [
                    'label'=>'Компания',
                    'class' => Company::class,
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ]
            )
            ->add('rezume',
                EntityType::class, 
                [
                    'label'=>'Резюме',
                    'class' => Rezume::class,
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ]
            )
            ->add('sendTime', 
                DateType::class, 
                [
                    'label'=>'Отправлено',
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'form-control input-inline datetimepicker'
                    ]
                ]
            )
            ->add('reaction', 
                DateType::class, 
                [
                    'label'=>'Отправлено',
                    'widget' => 'single_text',
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
            'data_class' => Reaction::class,
        ]);
    }
}
