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
     * @Route("/team{teamId}/game{gameId}", name="games", requirements={
     *      "teamId" = "[0-9]+",
     *      "gameId" = "[0-9]+"
     * })
     * @Method("GET")
     *
     * @param $teamId
     * @param $gameId
     * @return Response
     */
    public function indexAction($teamId, $gameId)
    {
        /** @var Game $games */
        $games = $this->getDoctrine()->getRepository('AppBundle:Game')->getTeamGames($teamId);
        /** @var Team $team */
        $team2 = $this->getDoctrine()->getRepository('AppBundle:Team')->find(
            $games[$gameId-1]->getTeam2()
        );

        return $this->render("AppBundle:Game:index.html.twig", array(
            'id' => $gameId,
            'game' => $games[$gameId-1],
            'team2' => $team2->getName()
        ));
    }
}
