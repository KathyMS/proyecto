<?php

namespace MakingDreams\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function showViewAction()
    {
        return $this->render('LoginBundle:Default:login.html.twig');
    }
}
