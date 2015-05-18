<?php

namespace Sofitech\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StudentType extends AbstractType
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
        $builder
            ->add('gender', 'choice', array('label' => 'Civilité', 'choices' => array('m' => 'M.', 'mme' => 'Mme')))
            ->add('lastname', 'text', array('label' => 'Nom'))
            ->add('firstname', 'text' , array('label' => 'Prénom'))
            ->add('email', 'email', array('label' => 'Mail'))
            ->add('birthdate', 'date', 
                    array(
                        'label' => 'Date de naissance',
                        'widget' => 'single_text', 
                        'format' => 'dd-MM-yyyy',
                        'attr' => array('placeholder' => 'jj/mm/aaaa'))
                );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sofitech_adminbundle_student';
    }
}
