<?php

namespace MakingDreams\AboutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function showAction()
    {
        return $this->render('AboutBundle:Default:about.html.twig');
    }
    
     public function show_mapaAction()
    {
        return $this->render('AboutBundle:Default:mapa.html.twig');
    }
}
