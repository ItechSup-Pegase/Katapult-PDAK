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
            ->add('street', 'text', array('label' => 'Adresse', 'attr' => array('onblur' => 'duplicateOnBlur(this.id)')))
            ->add('street2', 'text', array('label' => 'Adresse 2', 'attr' => array('onblur' => 'duplicateOnBlur(this.id)', 'required' => false)))
            ->add('city', 'text', array('label' => 'Ville', 'attr' => array('onblur' => 'duplicateOnBlur(this.id)')))
            ->add('zipcode', 'text', array('label' => 'Code postal', 'attr' => array('onblur' => 'duplicateOnBlur(this.id)')))
            ->add('country', 'text', array('label' => 'Pays', 'attr' => array('onblur' => 'duplicateOnBlur(this.id)')))
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
