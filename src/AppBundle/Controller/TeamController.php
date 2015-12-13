<?php

namespace AppBundle\Controller;

use AppBundle\Repositories\TeamRepository;
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
        /** @var TeamRepository $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->getTeamDeps($teamname);
        return $this->render("AppBundle:Team:index.html.twig", array(
            'team' => $team[0]
        ));
    }
}
