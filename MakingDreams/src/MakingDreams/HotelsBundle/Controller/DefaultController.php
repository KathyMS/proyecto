<?php

namespace MakingDreams\HotelsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function showViewAction()
    {
        return $this->render('HotelsBundle:Default:hotels.html.twig');
    }
    
     public function showHotelAction() {
        return $this->render('HotelsBundle:Default:hoteldetalle.html.twig');
    }
}
