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
     * @Route("/{teamname}/player{id}", name="players", requirements={"id" = "[0-9]+"})
     * @Method("GET")
     *
     * @param $id
     * @return Response
     */
    public function indexAction($teamname, $id)
    {
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->findOneBy(array('url' => $teamname));
        /** @var Player $players */
        $players = $this->getDoctrine()->getRepository('AppBundle:Player')->findBy(array('team' => $team));

        return $this->render("AppBundle:Player:index.html.twig", array(
            'id' => $id,
            'player' => $players[$id-1]
        ));
    }
}
