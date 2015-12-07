<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use AppBundle\Entity\Game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{
    /**
     * @Route("/{teamname}/game{id}", name="games", requirements={"id" = "[0-9]+"})
     * @Method("GET")
     *
     * @param $teamname
     * @param $id
     * @return Response
     */
    public function indexAction($teamname, $id)
    {
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->findOneBy(array('url' => $teamname));
        /** @var Game $games */
        $games = $this->getDoctrine()->getRepository('AppBundle:Game')->findBy(array('team' => $team));
        $team2Number = preg_replace('/Team /', '', $games[$id-1]->getTeam2());
        /** @var Team $team */
        $team2 = $this->getDoctrine()->getRepository('AppBundle:Team')->find($team2Number);

        return $this->render("AppBundle:Game:index.html.twig", array(
            'id' => $id,
            'game' => $games[$id-1],
            'team2' => $team2->getName()
        ));
    }
}
