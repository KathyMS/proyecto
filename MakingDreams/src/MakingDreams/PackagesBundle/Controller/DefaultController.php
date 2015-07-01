<?php

namespace MakingDreams\PackagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function showViewAction(Request $request) {
        $session = $request->getSession();

        if ($session->has('user')) {
            return $this->render('PackagesBundle:Default:packages.html.twig');
        } else {
            $this->get('session')->getFlashBag()->add(
                    'mensaje', 'Debe estar logueado para ver paquetes'
            );

            return $this->redirect($this->generateUrl('login_homepage'));
        }
    }

    public function showPackageAction(Request $request) {
        $session = $request->getSession();

        if ($session->has('user')) {
            return $this->render('PackagesBundle:Default:package.html.twig');
        } else {
            $this->get('session')->getFlashBag()->add(
                    'mensaje', 'Debe estar logueado para ver paquetes'
            );

            return $this->redirect($this->generateUrl('login_homepage'));
        }
    }

    public function showNewPackageAction(Request $request) {
        $session = $request->getSession();

        if ($session->has('user')) {
            return $this->render('PackagesBundle:Default:new_package.html.twig');
        } else {
            $this->get('session')->getFlashBag()->add(
                    'mensaje', 'Debe estar logueado para ver paquetes'
            );

            return $this->redirect($this->generateUrl('login_homepage'));
        }
    }

    public function showEditPackageAction(Request $request) {
        $session = $request->getSession();

        if ($session->has('user')) {
            return $this->render('PackagesBundle:Default:edit_package.html.twig');
        } else {
            $this->get('session')->getFlashBag()->add(
                    'mensaje', 'Debe estar logueado para ver paquetes'
            );

            return $this->redirect($this->generateUrl('login_homepage'));
        }
    }

}
