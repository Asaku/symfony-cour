<?php

namespace AppBundle\Controller;

use AppBundle\FileManager\FileManagerImage;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $variables = $em->getRepository('AppBundle:Post')->getSuperChien();
        
        return $this->render('default/index.html.twig',
            array('variables' => $variables,)
        );
    }
}
