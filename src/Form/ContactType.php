<?php

namespace App\Form;

use App\Entity\DepartmentEmail;
use App\Entity\Usercredentials;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           ->add('Name',TextType::class)
            ->add('Surname',TextType::class)
            ->add('Email',EmailType::class)
            ->add('Message',TextareaType::class)
            ->add('Department', EntityType::class,[
                'class' => DepartmentEmail::class,
                'choice_label'=>'NameDepartment'
    ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Usercredentials::class
        ]);
    }
}
