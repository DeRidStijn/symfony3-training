<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HobbyController extends Controller
{
    /**
     * @Route("/hobby/{hobby}", name="hobby_page")
     */
    public function indexAction(Request $request, $hobby)
    {
        return $this->render('hobby/' . $hobby . '.html.twig');
    }
}