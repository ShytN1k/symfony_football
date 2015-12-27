<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use AppBundle\Entity\Player;
use AppBundle\Form\PlayerType;
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

    /**
     * @Route("/team{teamId}/create-player", name="create-player", requirements={
     *      "teamId" = "[0-9]+",
     * })
     * @Method({"GET", "POST"})
     *
     * @return Response
     */
    public function createPlayerAction(Request $request, $teamId)
    {
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->find($teamId);
        $players = $this->getDoctrine()->getRepository('AppBundle:Player')->getTeamPlayers($teamId);

        $player = new Player();
        $form = $this->createForm(new PlayerType(), $player);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $player->setTeam($team);
                $em = $this->getDoctrine()->getManager();
                $em->persist($player);
                $em->flush();

                return $this->redirectToRoute('players', array(
                    'teamId' => $teamId,
                    'playerId' => count($players)+1
                ));
            }
        }


        return $this->render("AppBundle:Player:create-player.html.twig", array(
            'form' => $form->createView(),
            'player' => $players[0]
        ));
    }

    /**
     * @Route("/team{teamId}/player{playerId}-delete", name="player-delete", requirements={
     *      "teamId" = "[0-9]+",
     *      "playerId" = "[0-9]+"
     * })
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $teamId, $playerId)
    {
        $players = $this->getDoctrine()->getRepository('AppBundle:Player')->getTeamPlayers($teamId);
        $player = $players[$playerId-1];
        $form = $this->createDeleteForm($teamId, $playerId);

        if ($request->getMethod() == 'DELETE') {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->remove($player);
            $em->flush();
        }

        return $this->redirectToRoute('teams', array('teamId' => $teamId));
    }

    /**
     * @param $teamId
     * @param $playerId
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm($teamId, $playerId)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('player-delete', array(
                'teamId' => $teamId,
                'playerId' => $playerId
            )))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * @Route("/team{teamId}/player{playerId}/edit", name="edit-player", requirements={
     *      "teamId" = "[0-9]+",
     *      "playerId" = "[0-9]+"
     * })
     * @Method({"GET", "POST"})
     */
    public function editPlayerAction(Request $request, $teamId, $playerId)
    {
        $players = $this->getDoctrine()->getRepository('AppBundle:Player')->getTeamPlayers($teamId);
        $player = $players[$playerId-1];
        $deleteForm = $this->createDeleteForm($teamId, $playerId);
        $editForm = $this->createForm(new PlayerType(), $player);

        if ($request->getMethod() == 'POST') {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($player);
                $em->flush();

                return $this->redirectToRoute('players', array(
                    'teamId' => $teamId,
                    'playerId' => $playerId
                ));
            }
        }


        return $this->render("AppBundle:Player:edit-player.html.twig", array(
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'id' => $playerId,
            'player' => $players[$playerId-1]
        ));
    }
}
