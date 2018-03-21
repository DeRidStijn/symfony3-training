<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blogpost;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Blogpost controller.
 *
 * @Route("blog")
 */
class BlogController extends Controller
{
    /**
     * Lists all blogpost entities.
     *
     * @Route("/", name="blog_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blogposts = $em->getRepository('AppBundle:Blogpost')->findAll();

        return $this->render('blog/index.html.twig', array(
            'blogposts' => $blogposts,
        ));
    }

    /**
     * Finds and displays a blogpost entity.
     *
     * @Route("/{id}", name="blog_show")
     * @Method("GET")
     */
    public function showAction(Blogpost $blogpost)
    {

        return $this->render('blog/show.html.twig', array(
            'blogpost' => $blogpost
        ));
    }
}
