<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use AppBundle\Entity\Player;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends Controller
{
    /**
     * @Route("/team{teamId}/player{playerId}", name="players", requirements={
     *      "teamId" = "[0-9]+",
     *      "playerId" = "[0-9]+"
     * })
     * @Method("GET")
     *
     * @param $teamId
     * @param $playerId
     * @return Response
     */
    public function indexAction($teamId, $playerId)
    {
        /** @var Player $players */
        $players = $this->getDoctrine()->getRepository('AppBundle:Player')->getTeamPlayers($teamId);

        return $this->render("AppBundle:Player:index.html.twig", array(
            'id' => $playerId,
            'player' => $players[$playerId-1]
        ));
    }
}
