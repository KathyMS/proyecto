<?php

namespace MakingDreams\RestaurantsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MakingDreams\RestaurantsBundle\Entity\HotelRestaurante;
use MakingDreams\RestaurantsBundle\Form\HotelRestauranteType;

/**
 * HotelRestaurante controller.
 *
 */
class HotelRestauranteController extends Controller {

    /**
     * Lists all HotelRestaurante entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RestaurantsBundle:HotelRestaurante')->findAll();

        return $this->render('RestaurantsBundle:HotelRestaurante:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new HotelRestaurante entity.
     *
     */
    public function agregar_hotelrestauranteAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RestaurantsBundle:HotelRestaurante')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
        }
      
            return $this->render('RestaurantsBundle:HotelRestaurante:editar.html.twig', array(
                    'entity' => $entity));
        
    }

    public function imagenRestAction($id) {
//IMAGEN
        $root = getcwd();
        $target_dir = $root . '/uploads/';
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
        $target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $imageFileType2 = pathinfo($target_file2, PATHINFO_EXTENSION);
        $imageFileType3 = pathinfo($target_file3, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
//            $valor = $_POST["text"];
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            $check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
            $check3 = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
            if (($check !== false) && ($check2 !== false) && ($check3 !== false)) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if ((file_exists($target_file)) && (file_exists($target_file2)) && (file_exists($target_file3))) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if (($_FILES["fileToUpload"]["size"] > 500000) && ($_FILES["fileToUpload2"]["size"] > 500000) &&($_FILES["fileToUpload3"]["size"] > 500000)) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if (($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") &&
             ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif") &&
             ($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif")) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if ((move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) &&
                (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) &&
                (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3))) {
                
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                
                $em = $this->getDoctrine()->getManager();
                $img=$em->getRepository('RestaurantsBundle:ImagenesRestHot')->findOneByIdimagenesRestHot($id);
                
                if(!$img){
                $idRestHotel = $em->getRepository('RestaurantsBundle:HotelRestaurante')->find($id);
                $imRest = new \MakingDreams\RestaurantsBundle\Entity\ImagenesRestHot();
                $imRest->setImagen1('/uploads/'.basename($_FILES["fileToUpload"]["name"]));
                $imRest->setImagen2('/uploads/'.basename($_FILES["fileToUpload2"]["name"]));
                $imRest->setImagen3('/uploads/'.basename($_FILES["fileToUpload3"]["name"]));
                $imRest->setIdimagenesRestHot($idRestHotel);

                $em->persist($imRest);
                $em->flush();
                
                 echo "se inserto ";
                }
                else{
                $img->setImagen1('/uploads/'.basename($_FILES["fileToUpload"]["name"]));    
                $img->setImagen2('/uploads/'.basename($_FILES["fileToUpload2"]["name"]));
                $img->setImagen3('/uploads/'.basename($_FILES["fileToUpload3"]["name"]));
                $em->persist($img);
                $em->flush();  
                
                 echo "se actualizo ";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        return $this->render('RestaurantsBundle:HotelRestaurante:editar.html.twig');
    }

//image

    public function createAction(Request $request) {
        $entity = new HotelRestaurante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hotelrestaurante_show', array('id' => $entity->getId())));
        }

        return $this->render('RestaurantsBundle:HotelRestaurante:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a HotelRestaurante entity.
     *
     * @param HotelRestaurante $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(HotelRestaurante $entity) {
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
    public function newAction() {
        $entity = new HotelRestaurante();
        $form = $this->createCreateForm($entity);

        return $this->render('RestaurantsBundle:HotelRestaurante:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a HotelRestaurante entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RestaurantsBundle:HotelRestaurante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RestaurantsBundle:HotelRestaurante:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing HotelRestaurante entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RestaurantsBundle:HotelRestaurante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RestaurantsBundle:HotelRestaurante:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
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
    private function createEditForm(HotelRestaurante $entity) {
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
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RestaurantsBundle:HotelRestaurante')->find($id);

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

        return $this->render('RestaurantsBundle:HotelRestaurante:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a HotelRestaurante entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RestaurantsBundle:HotelRestaurante')->find($id);

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
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('hotelrestaurante_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete', 'attr' => array('class' => 'btn btn-primary')))
                        ->getForm()
        ;
    }

}
