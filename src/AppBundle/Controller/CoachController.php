<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CoachController extends Controller
{
    /**
     * @Route("/{teamname}/coach{id}", name="coaches", requirements={"id" = "[0-9]+"})
     * @Method("GET")
     * @Template()
     *
     * @param $id
     * @return Response
     */
    public function indexAction($id)
    {
        $id = "dwaDAWDWdw";
        return $this->render("AppBundle:Coach:index.html.twig", array('id' => $id));
    }
}
