<?php

namespace MakingDreams\RestaurantsBundle\Controller;

use myDBC;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
  public function indexAction() {
        include_once('myDBC.php');
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RestaurantsBundle:HotelRestaurante')->findAll();

        $seleccion = new myDBC();
        $tipo = 1;
        $datos = $seleccion->seleccionar_imagen_rest($tipo);

        return $this->render('RestaurantsBundle:Default:restaurants.html.twig', array(
                    'entities' => $entities,
                    'datos' => $datos,
        ));
    }

    public function showRestAction($id) {
        include_once('myDBC.php');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RestaurantsBundle:HotelRestaurante')->find($id);
        $entities = $em->getRepository('RestaurantsBundle:HotelRestaurante')->findAll();
        //$images = $em->getRepository('RestaurantsBundle:ImagenesRestHot')->findAll();
        $dato = $em->getRepository('RestaurantsBundle:ImagenesRestHot')->findOneByIdimagenesRestHot($id);
        
        $seleccion = new myDBC();
        $tipo=1;
        $datos = $seleccion->seleccionar_imagen_rest($tipo);
        $seleccion = new myDBC();
        $grupoImagenRest = $seleccion->seleccionar_imagenenes_de_unrestaurante($id);




        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
        }
        return $this->render('RestaurantsBundle:Default:restaurantDetail.html.twig', array(
                    'entity' => $entity,
                    'entities' => $entities,
                    'dato' => $dato,
                    'datos' => $datos,
                    'imagenes' => $grupoImagenRest,
        ));
    }

    public function showViewAction($id) {
        return $this->render('RestaurantsBundle:Default:restaurants.html.twig');
    }

//    public function showRestAction() {
//        return $this->render('RestaurantsBundle:Default:restaurantDetail.html.twig');
//    }

    public function showRestAdminAction() {
        return $this->render('RestaurantsBundle:Default:restauranteAdministrador.html.twig');
    }

}
