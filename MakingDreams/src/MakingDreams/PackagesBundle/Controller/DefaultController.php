<?php

namespace MakingDreams\PackagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function showViewAction(Request $request) {
        $session = $request->getSession();

        if ($session->has('user')) {
            if (!$request->isXmlHttpRequest()) {
                $paquetesPorUsuario = $this->packagesByUser($session->get('user'));
            }

            $totalCount = $this->getTotalRow();

            //Opcion de mostrar los datos
            $option = $this->getOption($request->get("option"), $session);

            //numero de pagina
            $page = $this->getPage($request->get("page"), $session);

            //paginacion
            $forPage = 10;
            $totalPage = ceil($totalCount / $forPage);

            if ($totalCount <= $forPage) {
                $page = 1;
            }
            if (($page * $forPage) > $totalCount) {
                $page = $totalPage;
            }
            $offset = 0;
            if ($page > 1) {
                $offset = $forPage * ($page - 1);
            }

            //Obtiene los paquetes
            $paquetes = $this->getPackagesOrder($option, $offset, $forPage);
            return $this->render('PackagesBundle:Default:packages.html.twig', compact("paquetesPorUsuario", "paquetes", "forPage", "totalPage", "totalCount", "page"));
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

    public function searchAction(Request $request) {
        $session = $request->getSession();

        if ($session->has('user')) {
            if ($request->isXmlHttpRequest()) {
                $name = $request->get('nameSearch');
                
                
                $totalCount = $this->getTotalRow();

                //Opcion de mostrar los datos
                $option = $this->getOption($request->get("option"), $session);

                //numero de pagina
                $page = $this->getPage($request->get("page"), $session);

                //paginacion
                $forPage = 10;
                $totalPage = ceil($totalCount / $forPage);

                if ($totalCount <= $forPage) {
                    $page = 1;
                }
                if (($page * $forPage) > $totalCount) {
                    $page = $totalPage;
                }
                $offset = 0;
                if ($page > 1) {
                    $offset = $forPage * ($page - 1);
                }

                //Obtiene los paquetes
                $paquetes = $this->getPackagesOrder($option, $offset, $forPage);
                return $this->render('PackagesBundle:Default:packages.html.twig', compact("paquetesPorUsuario", "paquetes", "forPage", "totalPage", "totalCount", "page"));
            } else {
                return $this->redirect($this->generateUrl('packages_homepage'));
            }
        } else {
            $this->get('session')->getFlashBag()->add(
                    'mensaje', 'Debe estar logueado para ver paquetes'
            );
            return $this->redirect($this->generateUrl('login_homepage'));
        }
    }

    private function getTotalRow() {
        return $this->getDoctrine()->getManager()
                        ->createQueryBuilder('PackagesBundle:Paquete')
                        ->select('Count(p)')
                        ->from('PackagesBundle:Paquete', 'p')
                        ->getQuery()
                        ->getSingleScalarResult();
    }

    private function packagesByUser($user) {
        return $this->getDoctrine()
                        ->getManager()
                        ->getRepository('PackagesBundle:Paquete')
                        ->findBy(array('idUsuario' => $user->getId()));
    }

    private function getOption($option, $session) {
        if (!is_numeric($option)) {
            if ($session->has('option')) {
                $option = $session->get('option');
            } else {
                $option = 1;
                $session->set('option', $option);
            }
        } else {
            $option = floor($option);
            $session->set('option', $option);
        }
        return $option;
    }

    private function getPage($page, $session) {
        if (!is_numeric($page)) {
            if ($session->has('page')) {
                $page = $session->get('page');
            } else {
                $page = 1;
                $session->set('page', $page);
            }
        } else {
            $page = floor($page);
            $session->set('page', $page);
        }
        return $page;
    }

    private function getPackagesOrder($option, $offset, $forPage) {
        if ($option == 1) {
            return $this->getDoctrine()
                            ->getManager()
                            ->createQueryBuilder('PackagesBundle:Paquete')
                            ->select('p')
                            ->from('PackagesBundle:Paquete', 'p')
                            ->orderBy("p.nombre", "asc")
                            ->setFirstResult($offset)
                            ->setMaxResults($forPage)
                            ->getQuery()
                            ->getArrayResult();
        } else if ($option == 2) {
            return $this->getDoctrine()
                            ->getManager()
                            ->createQueryBuilder('PackagesBundle:Paquete')
                            ->select('p')
                            ->from('PackagesBundle:Paquete', 'p')
                            ->orderBy("p.nombre", "asc")
                            ->setFirstResult($offset)
                            ->setMaxResults($forPage)
                            ->getQuery()
                            ->getArrayResult();
        } else if ($option == 3) {
            return $this->getDoctrine()
                            ->getManager()
                            ->createQueryBuilder('PackagesBundle:Paquete')
                            ->select('p')
                            ->from('PackagesBundle:Paquete', 'p')
                            ->orderBy("p.nombre", "desc")
                            ->setFirstResult($offset)
                            ->setMaxResults($forPage)
                            ->getQuery()
                            ->getArrayResult();
        }
    }

}
