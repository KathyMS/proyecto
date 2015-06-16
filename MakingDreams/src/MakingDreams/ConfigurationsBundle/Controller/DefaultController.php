<?php

namespace MakingDreams\ConfigurationsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function configurationsAction(Request $request) {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $this->getRequest()->getSession()->set('type', $request->get("type"));
        }
    }

}
