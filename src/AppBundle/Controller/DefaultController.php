<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function indexAction()
    {
        $teams = $this->getDoctrine()->getRepository('AppBundle:Team')->findAll();
        if (empty($teams)) {
            return $this->redirectToRoute('generator');
        } else {
            return $this->render("AppBundle:Default:index.html.twig", array('teams'=>$teams));
        }
    }
}
