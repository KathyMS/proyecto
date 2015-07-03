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

            $user = $this->getDoctrine()->getRepository('LoginBundle:Usuario')->findOneBy(array("correo" => $usuario, "contrasena" => $pass));
            if ($user) {
                $session = $request->getSession();
                $session->set("id", $user->getId());
                $session->set("correo", $user->getCorreo());
                $session->set('user', $user);

                if ($user->getTipo() == 1) {
                    return $this->render('LoginBundle:Default:login_admin.html.twig');
                }
                else{
                    return $this->redirect($this->generateUrl("packages_homepage"));
                }
            } else {
                $this->get('session')->getFlashBag()->add(
                        'mensaje', 'Los datos no son validos'
                );
                return $this->redirect($this->generateUrl("login_homepage"));
            }
        }//fin if
        return $this->redirect($this->generateUrl("login_homepage"));
    }

    public function logoutAction(Request $request) {
        $request->getSession()->remove('user');
        return $this->redirect($this->generateUrl("login_homepage"));
    }

}
