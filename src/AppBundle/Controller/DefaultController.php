<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/{page}", name="homepage", requirements={"page": "\d+"})
     */
    public function indexAction($page = 1, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AppBundle:Post')->getPagination(
            $page, 5, $request->query->get('category'), $request->query->get('search')
        );

        $categories = $em->getRepository('AppBundle:Category')->findAll();

        $maxPages = $posts->count();
        if ($maxPages == 0)
            $maxPages = 1;

        $pagination = array(
            'page' => $page,
            'route' => 'homepage',
            'pages_count' => ceil($maxPages / 2),
            'route_params' => array()
        );

        return $this->render('Default/index.html.twig',
            array(
                'posts' => $posts->getQuery()->getResult(),
                'pagination' => $pagination,
                'categories' => $categories
                )
        );
    }

    /**
     * @Route("article/{slug}", name="article_display")
     */
    public function articleAction($slug, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Post')->findOneBy(
            array('public' => true, 'slug' => $slug));

        if (!$post)
            throw new NotFoundHttpException('Aucun article');

        $comments = $em->getRepository('AppBundle:Comment')->findBy(
            array('post' => $post));

        $comment = new Comment();
        $commentForm = $this->createForm('AppBundle\Form\CommentType', $comment);
        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $comment->setPost($post);
            $em->persist($comment);
            $em->flush($comment);

            return $this->redirectToRoute('article_display', array('slug' => $slug));
        }

        return $this->render('Default/show.html.twig',
            array(
                'post' => $post,
                'comments' => $comments,
                'commentForm' => $commentForm->createView()
            )
        );
    }

    /**
     * @Route("test/render-test", name="render_test")
     */
    public function renderTestAction()
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:Post')->find(1);

        if (!$post)
            throw new EntityNotFoundException('haha');

        $html = $this->render('Default/show.html.twig',
            array('post' => $post,)
        );

        return new Response($html);
    }
}
