<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    /**
     * @Route("/{teamname}", name="teams", requirements={"teamname" = "[_a-zA-Z]+"})
     * @Method("GET")
     *
     * @param $teamname
     * @return Response
     */
    public function indexAction($teamname)
    {
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->findOneBy(array('url' => $teamname));
        return $this->render("AppBundle:Team:index.html.twig", array(
            'team' => $team
        ));
    }
}
