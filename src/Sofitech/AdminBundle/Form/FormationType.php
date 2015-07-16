<?php

namespace Sofitech\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class FormationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categories', 'entity', array(
                'label' => 'Categorie',
                'class' => 'SofitechAdminBundle:Category',
                'query_builder' => function(EntityRepository $er) use ($options){
                    return $er->createQueryBuilder('c')
                        ->where('c.parentCategory = :id')
                        ->setParameter('id', $options['attr']['idCategory']);
                },
                'required' => true))
            ->add('name')
            ->add('description')
            ->add('duration')
            ->add('program')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sofitech\AdminBundle\Entity\Formation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sofitech_adminbundle_formation';
    }
}
