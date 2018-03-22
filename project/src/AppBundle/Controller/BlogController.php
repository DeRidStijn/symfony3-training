<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blogpost;
use AppBundle\Entity\Commentpost;
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
     * @Route("/{id}", name="blog_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Blogpost $blogpost, Request $request)
    { // create the form here

        $comments = $blogpost->getComments();
        
        $comment = new Commentpost();
        $comment->setBlogpost($blogpost);
        $form = $this->createForm('AppBundle\Form\CommentpostType', $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->render('blog/show.html.twig', array(
                'blogpost' => $blogpost,
                'comments' => $comments,
                'form' => $form->createView(),
            ));
            }

            return $this->render('blog/show.html.twig', array(
                'blogpost' => $blogpost,
                'comments' => $comments,
                'form' => $form->createView(),
            ));
    }


    /*public function newcommentAction(request $request)
    {
        $comment = new Comment();
        $comment->setBlogpost($blogpost);
        $commentForm = $this->createFormBuilder($comment) 
            ->add('name', TextType::class)
            ->add('comment', TextareaType::class)
            ->add('save', SubmitType::class, array('label' =>'Submit comment')) 
            ->getForm(); 
        return $this->render('blogpost/show.html.twig', array( 
            'blogpost' => $blogpost,    
            'comments' => $comments,     
            'delete_form' => $deleteForm->createView(), 
            'comment_form' =>$commentForm->createView(), ));
    }*/

}
