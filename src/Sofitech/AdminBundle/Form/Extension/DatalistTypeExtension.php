<?php
namespace Sofitech\AdminBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DatalistTypeExtension extends AbstractTypeExtension
{
    /**
     * Retourne le nom du type de champ qui est étendu
     *
     * @return string Le nom du type qui est étendu
     */
    public function getExtendedType()
    {
        return 'entity';
    }

    /**
     * Ajoute l'option image_path
     *
     * @param $resolver
     */
    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array('datalist'));
    }

    /**
     * Passe l'url de l'image à la vue
     *
     * @param $view
     * @param $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (array_key_exists('datalist', $options)) {
            $parentData = $form->getParent()->getData();

            if (null !== $parentData) {
                $accessor = PropertyAccess::createPropertyAccessor();
                $imageUrl = $accessor->getValue($parentData, $options['datalist']);
            }
        }
    }
}