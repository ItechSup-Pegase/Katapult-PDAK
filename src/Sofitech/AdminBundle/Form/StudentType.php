<?php

namespace Sofitech\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends PersonType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sofitech\AdminBundle\Entity\Student'
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('customer','entity', array('label' => 'Entreprise', 'class' => 'SofitechAdminBundle:Customer','required' => false,'empty_value' => '','empty_data'  => null))
            // ->add('customer', 'text', array('label' => 'Client', 'required' => false))
        ;
            
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sofitech_adminbundle_student';
    }
}
