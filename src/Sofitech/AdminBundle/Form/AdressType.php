<?php

namespace Sofitech\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdressType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'text', array('label' => 'Type'))
            ->add('street', 'text', array('label' => 'Rue'))
            ->add('city', 'text', array('label' => 'Ville'))
            ->add('zipcode', 'text', array('label' => 'Code postal'))
            ->add('country', 'text', array('label' => 'Pays'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sofitech\AdminBundle\Entity\Adress'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sofitech_adminbundle_adress';
    }
}
