<?php

namespace MakingDreams\ConfigurationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function configurationsAction(Request $request) {
        $this->getRequest()->getSession()->set('type', $request->get("type"));
        return $this->redirect($this->generateUrl($request->get("uri")));
    }

}
