<?php

namespace MakingDreams\LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function showViewAction() {
        return $this->render('LoginBundle:Default:login.html.twig');
    }

    public function loginAction(Request $request) {
        if ($request->getMethod() == "POST") {
            $usuario = $request->get("email");
            $pass = $request->get("password");
            echo $usuario . "------------" . $pass;
            $user = $this->getDoctrine()->getRepository('LoginBundle:Usuario')->findOneBy(array("correo" => $usuario, "contrasena" => $pass));

            echo $user->getNombre();
            if ($user) {
                $session = $request->getSession();
                $session->set("id", $user->getId());
                $session->set("correo", $user->getCorreo());

                if ($user->getTipo() == 1 && strcasecmp($user->getContrasena(), $pass) == 0) {
                    return $this->redirect($this->generateUrl("packages_homepage"));
                }
            } else {
                $this->get('session')->getFlashBag()->add(
                        'mensaje', 'Los datos no son validos'
                );
                return $this->redirect($this->generateUrl("login_homepage"));
            }
        }//fin if
        return $this->render('LoginBundle:Default:login.html.twig');
    }

//fon loginAction
}

//fin class
    