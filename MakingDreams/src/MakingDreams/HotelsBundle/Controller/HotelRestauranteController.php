<?php

namespace MakingDreams\HotelsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MakingDreams\HotelsBundle\Entity\HotelRestaurante;
use MakingDreams\HotelsBundle\Form\HotelRestauranteType;

/**
 * HotelRestaurante controller.
 *
 */
class HotelRestauranteController extends Controller
{

    /**
     * Lists all HotelRestaurante entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HotelsBundle:HotelRestaurante')->findAll();

        return $this->render('HotelsBundle:HotelRestaurante:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new HotelRestaurante entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new HotelRestaurante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hotelrestaurante_show', array('id' => $entity->getId())));
        }

        return $this->render('HotelsBundle:HotelRestaurante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a HotelRestaurante entity.
     *
     * @param HotelRestaurante $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(HotelRestaurante $entity)
    {
        $form = $this->createForm(new HotelRestauranteType(), $entity, array(
            'action' => $this->generateUrl('hotelrestaurante_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-primary')));

        return $form;
    }

    /**
     * Displays a form to create a new HotelRestaurante entity.
     *
     */
    public function newAction()
    {
        $entity = new HotelRestaurante();
        $form   = $this->createCreateForm($entity);

        return $this->render('HotelsBundle:HotelRestaurante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a HotelRestaurante entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelsBundle:HotelRestaurante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelsBundle:HotelRestaurante:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing HotelRestaurante entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelsBundle:HotelRestaurante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HotelsBundle:HotelRestaurante:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a HotelRestaurante entity.
    *
    * @param HotelRestaurante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(HotelRestaurante $entity)
    {
        $form = $this->createForm(new HotelRestauranteType(), $entity, array(
            'action' => $this->generateUrl('hotelrestaurante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

       $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array('class' => 'btn btn-primary')));

        return $form;
    }
    /**
     * Edits an existing HotelRestaurante entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HotelsBundle:HotelRestaurante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('hotelrestaurante_edit', array('id' => $id)));
        }

        return $this->render('HotelsBundle:HotelRestaurante:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a HotelRestaurante entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HotelsBundle:HotelRestaurante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hotelrestaurante'));
    }

    /**
     * Creates a form to delete a HotelRestaurante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hotelrestaurante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm()
        ;
    }
}
