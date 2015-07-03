<?php

namespace MakingDreams\HotelsBundle\Controller;

use myDBC;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        include_once('myDBC.php');
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RestaurantsBundle:HotelRestaurante')->findAll();

        $seleccion = new myDBC();
        $tipo = 2;
        $datos = $seleccion->seleccionar_imagen_rest($tipo);

        return $this->render('HotelsBundle:Default:hotels.html.twig', array(
                    'entities' => $entities,
                    'datos' => $datos,
        ));
    }

    public function showHotelAction($id) {
        include_once('myDBC.php');

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RestaurantsBundle:HotelRestaurante')->find($id);
        $entities = $em->getRepository('RestaurantsBundle:HotelRestaurante')->findAll();
        //$images = $em->getRepository('RestaurantsBundle:ImagenesRestHot')->findAll();
        $dato = $em->getRepository('RestaurantsBundle:ImagenesRestHot')->findOneByIdimagenesRestHot($id);

        $seleccion = new myDBC();
        $tipo = 2;
        $datos = $seleccion->seleccionar_imagen_rest($tipo);
        $seleccion = new myDBC();
        $grupoImagenRest = $seleccion->seleccionar_imagenenes_de_unrestaurante($id);




        if (!$entity) {
            throw $this->createNotFoundException('Unable to find HotelRestaurante entity.');
        }
        return $this->render('HotelsBundle:Default:hoteldetalle.html.twig', array(
                    'entity' => $entity,
                    'entities' => $entities,
                    'dato' => $dato,
                    'datos' => $datos,
                    'imagenes' => $grupoImagenRest,
        ));
    }

}
