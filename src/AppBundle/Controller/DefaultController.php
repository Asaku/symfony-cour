<?php

namespace AppBundle\Controller;

use AppBundle\FileManager\FileManagerImage;
use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/page-{page}", name="homepage")
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->getPagination($page, 2);

        $maxPages = $posts->count();
        if ($maxPages == 0)
            $maxPages = 1;

        $pagination = array(
            'page' => $page,
            'route' => 'homepage',
            'pages_count' => ceil($maxPages / 2),
            'route_params' => array()
        );

        return $this->render('default/index.html.twig',
            array(
                'posts' => $posts,
                'pagination' => $pagination
                )
        );
    }

    /**
     * @Route("article/{slug}", name="article_display")
     */
    public function articleAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Post')->findOneBy(
            array('public' => true, 'slug' => $slug));

        if (!$post)
            throw new EntityNotFoundException('haha');

        return $this->render('default/show.html.twig',
            array('post' => $post,)
        );
    }
}
