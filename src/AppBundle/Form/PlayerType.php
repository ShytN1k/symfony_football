<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PlayerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('lastname', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('number', IntegerType::class, array('attr' => array('class' => 'form-control')))
            ->add('birthday', BirthdayType::class, array('format' => 'dd-MM-yyyy'))
            ->add('nationality', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('summary', TextareaType::class, array('attr' => array('class' => 'form-control')))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Player',
        ));
    }
}
