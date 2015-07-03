<?php

namespace MakingDreams\DestinationsBundle\Controller;

use myDBC;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        include_once('myDBC.php');
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DestinationsBundle:Destino')->findAll();

        $seleccion = new myDBC();

        $datos = $seleccion->seleccionar_imagen_rest();

        return $this->render('DestinationsBundle:Default:destination.html.twig', array(
                    'entities' => $entities,
                    'datos' => $datos,
        ));
    }

    public function restaurantsAction($provincia) {

        include_once('myDBC.php');
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DestinationsBundle:Destino')->findAll();

        $seleccion = new myDBC();
        $datos = $seleccion->seleccionar_restaurants_destino($provincia);

        return $this->render('DestinationsBundle:Default:restaurants.html.twig', array(
                    'entities' => $entities,
                    'datos' => $datos,
        ));
    }

    public function showDetailAction($id) {
        return $this->render('DestinationsBundle:Default:destinydetails.html.twig');
    }

}
