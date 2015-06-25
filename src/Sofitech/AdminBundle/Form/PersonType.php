<?php

namespace Sofitech\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PersonType extends AbstractType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sofitech\AdminBundle\Entity\Person'
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder
            ->add('gender', 'choice', array('label' => 'Civilité', 'choices' => array('m' => 'M.', 'mme' => 'Mme')))
            ->add('lastname', 'text', array('label' => 'Nom'))
            ->add('firstname', 'text' , array('label' => 'Prénom'))
            ->add('email', 'email', array('label' => 'Mail'))
            ->add('phone', 'text', array('label' => 'Téléphone'))
            ->add('mobile', 'text', array('label' => 'Portable', 'required' => false))
            ->add('birthdate', 'date', 
                    array(
                        'label' => 'Date de naissance',
                        'widget' => 'single_text', 
                        'format' => 'dd-MM-yyyy',
                        'attr' => array('placeholder' => 'jj/mm/aaaa', 'pattern' => '(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d')
                        )
                )
            ->add('adresses', 'collection', array(
                'label' => 'Adresse',
                'type' => new AdressType(),
                'allow_add' => true,
                'allow_delete' => true,
                ))
            ;

    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'sofitech_adminbundle_person';
    }
}