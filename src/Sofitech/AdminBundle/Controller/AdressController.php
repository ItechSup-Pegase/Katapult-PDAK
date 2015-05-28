<?php

namespace Sofitech\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sofitech\AdminBundle\Entity\Adress;
use Sofitech\AdminBundle\Form\AdressType;

/**
 * Adress controller.
 *
 * @Route("/adress")
 */
class AdressController extends Controller
{

    /**
     * Lists all Adress entities.
     *
     * @Route("/", name="adress")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SofitechAdminBundle:Adress')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Adress entity.
     *
     * @Route("/", name="adress_create")
     * @Method("POST")
     * @Template("SofitechAdminBundle:Adress:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Adress();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adress_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Adress entity.
     *
     * @param Adress $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Adress $entity)
    {
        $form = $this->createForm(new AdressType(), $entity, array(
            'action' => $this->generateUrl('adress_create'),
            'method' => 'POST',
        ));

        // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Adress entity.
     *
     * @Route("/new", name="adress_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Adress();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Adress entity.
     *
     * @Route("/{id}", name="adress_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SofitechAdminBundle:Adress')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adress entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Adress entity.
     *
     * @Route("/{id}/edit", name="adress_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SofitechAdminBundle:Adress')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adress entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Adress entity.
    *
    * @param Adress $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Adress $entity)
    {
        $form = $this->createForm(new AdressType(), $entity, array(
            'action' => $this->generateUrl('adress_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        // $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Adress entity.
     *
     * @Route("/{id}", name="adress_update")
     * @Method("PUT")
     * @Template("SofitechAdminBundle:Adress:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SofitechAdminBundle:Adress')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adress entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adress_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Adress entity.
     *
     * @Route("/{id}", name="adress_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SofitechAdminBundle:Adress')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Adress entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adress'));
    }

    /**
     * Creates a form to delete a Adress entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adress_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
