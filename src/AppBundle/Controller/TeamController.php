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
        $teamname = preg_replace('/_/', ' ', $teamname);
        /** @var TeamRepository $team */
        $teams = $this->getDoctrine()->getRepository('AppBundle:Team')->getTeamDeps($teamname);
        foreach ($teams as $team) {
            $team->setUrl(preg_replace('/ /', '_', $team->getUrl()));
            $team->setUrl(preg_replace('/-/', '_', $team->getUrl()));
        }
        return $this->render("AppBundle:Team:index.html.twig", array(
            'team' => $teams[0]
        ));
    }
}
