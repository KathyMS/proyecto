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

    public function showNewPackageAction() {
        return $this->render('PackagesBundle:Default:new_package.html.twig');
    }

    public function showEditPackageAction() {
        return $this->render('PackagesBundle:Default:edit_package.html.twig');
    }
}
