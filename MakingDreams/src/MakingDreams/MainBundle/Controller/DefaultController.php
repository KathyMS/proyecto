<?php

namespace MakingDreams\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function mainAction()
    {
        return $this->render('MainBundle:Default:main.html.twig');
    }
}
