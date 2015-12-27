<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoachType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('attr' => array('class' => 'form-control')))
            ->add('lastname', 'text', array('attr' => array('class' => 'form-control')))
            ->add('expirience', 'integer', array('attr' => array('class' => 'form-control')))
            ->add('age', 'integer', array('attr' => array('class' => 'form-control')))
            ->add('nationality', 'text', array('attr' => array('class' => 'form-control')))
            ->add('summary', 'textarea', array('attr' => array('class' => 'form-control')))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Coach',
        ));
    }
}
