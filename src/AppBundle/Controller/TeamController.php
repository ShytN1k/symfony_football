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
     * @Route("/team{teamId}", name="teams", requirements={"teamId" = "[0-9]+"})
     * @Method("GET")
     *
     * @param $teamId
     * @return Response
     */
    public function indexAction($teamId)
    {
        /** @var TeamRepository $teams */
        $teams = $this->getDoctrine()->getRepository('AppBundle:Team')->getTeamDeps($teamId);

        return $this->render("AppBundle:Team:index.html.twig", array(
            'team' => $teams[0]
        ));
    }
}
