<?php

namespace App\Form;

use App\Entity\Rezume;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RezumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position',
                    TextType::class, 
                    [
                        'label'=>'Должность',
                        'attr' => [
                            'class' => 'form-control'
                        ]
                    ]
            )
            ->add('file_upload', FileType::class,[
                'mapped' => false,
                'label'=>'Внешний файл',
                'data_class' => null,
                'required' => false,   
                //'label_attr'=> ['class' => 'register-label'],
                'attr' => ['class' => 'form-control'],                             
            ])


            ->add('text',
                TextareaType::class, 
                [
                    'label'=>'Описание',
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ]
    
            )
            ->add('createdAt',
                DateType::class, 
                [
                    'label'=>'Создано',
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ]            
            )
            ->add('updatedAt',
                DateType::class, 
                [
                    'label'=>'Обновлено',
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
            'data_class' => Rezume::class,
        ]);
    }

    public function getName()
    {
        return 'rezume';
    }

}
