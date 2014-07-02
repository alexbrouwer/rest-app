<?php

namespace Zero\ApiDocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApiDocController extends Controller
{
    public function indexAction()
    {
        return $this->render('ZeroApiDocBundle:ApiDoc:index.html.twig', array(
                // ...
            ));    }

}
