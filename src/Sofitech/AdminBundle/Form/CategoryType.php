<?php

namespace Sofitech\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text' , array('label' => 'Intitulé'))
            ->add('description', 'text' , array('label' => 'Déscription'))
            ->add('parentCategory','entity', array('label' => 'Catégorie mère', 'class' => 'SofitechAdminBundle:Category','required' => false,'empty_value' => '','empty_data'  => null))
            //->add('formations')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sofitech\AdminBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sofitech_adminbundle_category';
    }
}
