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
        $posts = $em->getRepository('AppBundle:Post')->findByPublic(true);

        return $this->render('default/index.html.twig',
            array('posts' => $posts,)
        );
    }
}
