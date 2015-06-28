<?php

namespace MakingDreams\PackagesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MakingDreams\PackagesBundle\Entity\Paquete;
use MakingDreams\PackagesBundle\Form\PaqueteType;

/**
 * Paquete controller.
 *
 */
class PaqueteController extends Controller
{

    /**
     * Lists all Paquete entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PackagesBundle:Paquete')->findAll();

        return $this->render('PackagesBundle:Paquete:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Paquete entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Paquete();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('paquete_show', array('id' => $entity->getId())));
        }

        return $this->render('PackagesBundle:Paquete:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Paquete entity.
     *
     * @param Paquete $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Paquete $entity)
    {
        $form = $this->createForm(new PaqueteType(), $entity, array(
            'action' => $this->generateUrl('paquete_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Paquete entity.
     *
     */
    public function newAction()
    {
        $entity = new Paquete();
        $form   = $this->createCreateForm($entity);

        return $this->render('PackagesBundle:Paquete:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Paquete entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PackagesBundle:Paquete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PackagesBundle:Paquete:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Paquete entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PackagesBundle:Paquete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PackagesBundle:Paquete:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Paquete entity.
    *
    * @param Paquete $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Paquete $entity)
    {
        $form = $this->createForm(new PaqueteType(), $entity, array(
            'action' => $this->generateUrl('paquete_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Paquete entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PackagesBundle:Paquete')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('paquete_edit', array('id' => $id)));
        }

        return $this->render('PackagesBundle:Paquete:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Paquete entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PackagesBundle:Paquete')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Paquete entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('paquete'));
    }

    /**
     * Creates a form to delete a Paquete entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('paquete_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
