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
            ->add('birthdate', 'date', 
                    array(
                        'label' => 'Date de naissance',
                        'widget' => 'single_text', 
                        'format' => 'dd-MM-yyyy',
                        'attr' => array('placeholder' => 'jj/mm/aaaa', 'pattern' => '^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$')
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