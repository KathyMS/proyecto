<?php

namespace MakingDreams\RestaurantsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function showViewAction() {
        return $this->render('RestaurantsBundle:Default:restaurants.html.twig');
    }

    public function showRestAction() {
        return $this->render('RestaurantsBundle:Default:restaurantDetail.html.twig');
    }

    public function showRestAdminAction() {
        return $this->render('RestaurantsBundle:Default:restauranteAdministrador.html.twig');
    }

}
