<?php

namespace MakingDreams\DestinationsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MakingDreams\DestinationsBundle\Entity\Destino;
use MakingDreams\DestinationsBundle\Form\DestinoType;

/**
 * Destino controller.
 *
 */
class DestinoController extends Controller
{

    /**
     * Lists all Destino entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DestinationsBundle:Destino')->findAll();

        return $this->render('DestinationsBundle:Destino:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Destino entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Destino();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('destino_show', array('id' => $entity->getId())));
        }

        return $this->render('DestinationsBundle:Destino:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Destino entity.
     *
     * @param Destino $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Destino $entity)
    {
        $form = $this->createForm(new DestinoType(), $entity, array(
            'action' => $this->generateUrl('destino_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Destino entity.
     *
     */
    public function newAction()
    {
        $entity = new Destino();
        $form   = $this->createCreateForm($entity);

        return $this->render('DestinationsBundle:Destino:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Destino entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DestinationsBundle:Destino')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Destino entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DestinationsBundle:Destino:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Destino entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DestinationsBundle:Destino')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Destino entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DestinationsBundle:Destino:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Destino entity.
    *
    * @param Destino $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Destino $entity)
    {
        $form = $this->createForm(new DestinoType(), $entity, array(
            'action' => $this->generateUrl('destino_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Destino entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DestinationsBundle:Destino')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Destino entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('destino_edit', array('id' => $id)));
        }

        return $this->render('DestinationsBundle:Destino:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Destino entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DestinationsBundle:Destino')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Destino entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('destino'));
    }

    /**
     * Creates a form to delete a Destino entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('destino_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
