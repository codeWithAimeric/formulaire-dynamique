<?php

namespace App\Form;

use App\Entity\Form;
use App\Entity\FormField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormFieldType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('label', TextType::class, [
            'label' => 'Label',
            'attr' => ['class' => 'form-control mb-2'],  
        ])
        ->add('type', ChoiceType::class, [
            'label' => 'Type',
            'choices' => [
                'Text' => 'text',
                'Textarea' => 'textarea',
                'Date' => 'date',
                'Number' => 'number',
            ],
            'attr' => ['class' => 'form-select mb-2'], 
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FormField::class,
        ]);
    }
}
