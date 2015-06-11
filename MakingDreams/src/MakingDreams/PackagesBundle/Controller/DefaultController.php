<?php

namespace MakingDreams\PackagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function showViewAction() {
        return $this->render('PackagesBundle:Default:packages.html.twig');
    }

    public function showPackageAction() {
        return $this->render('PackagesBundle:Default:package.html.twig');
    }

}
