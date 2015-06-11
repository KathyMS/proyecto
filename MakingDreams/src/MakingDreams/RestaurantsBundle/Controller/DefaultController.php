<?php

namespace MakingDreams\RestaurantsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function showViewAction()
    {
        return $this->render('RestaurantsBundle:Default:restaurants.html.twig');
    }
}
