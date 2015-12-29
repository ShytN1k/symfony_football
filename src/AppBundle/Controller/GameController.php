<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use AppBundle\Entity\Game;
use AppBundle\Form\GameType;
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

    /**
     * @Route("/team{teamId}/create-game", name="create-game", requirements={
     *      "teamId" = "[0-9]+",
     * })
     * @Method({"GET", "POST"})
     *
     * @return Response
     */
    public function createGameAction(Request $request, $teamId)
    {
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->find($teamId);
        $games = $this->getDoctrine()->getRepository('AppBundle:Game')->getTeamGames($teamId);

        $game = new Game();
        $form = $this->createForm(new GameType(), $game);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $game->setTeam($team);
                $em = $this->getDoctrine()->getManager();
                $em->persist($game);
                $em->flush();

                return $this->redirectToRoute('games', array(
                    'teamId' => $teamId,
                    'gameId' => count($games)+1
                ));
            }
        }


        return $this->render("AppBundle:Game:create-game.html.twig", array(
            'form' => $form->createView(),
            'game' => $games[0]
        ));
    }

    /**
     * @Route("/team{teamId}/game{gameId}-delete", name="game-delete", requirements={
     *      "teamId" = "[0-9]+",
     *      "gameId" = "[0-9]+"
     * })
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $teamId, $gameId)
    {
        $games = $this->getDoctrine()->getRepository('AppBundle:Game')->getTeamGames($teamId);
        $game = $games[$gameId-1];
        $form = $this->createDeleteForm($teamId, $gameId);

        if ($request->getMethod() == 'DELETE') {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->remove($game);
            $em->flush();
        }

        return $this->redirectToRoute('teams', array('teamId' => $teamId));
    }

    /**
     * @param $teamId
     * @param $gameId
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm($teamId, $gameId)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('game-delete', array(
                'teamId' => $teamId,
                'gameId' => $gameId
            )))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * @Route("/team{teamId}/game{gameId}/edit", name="edit-game", requirements={
     *      "teamId" = "[0-9]+",
     *      "gameId" = "[0-9]+"
     * })
     * @Method({"GET", "POST"})
     */
    public function editGameAction(Request $request, $teamId, $gameId)
    {
        $games = $this->getDoctrine()->getRepository('AppBundle:Game')->getTeamGames($teamId);
        $game = $games[$gameId-1];
        $team2 = $this->getDoctrine()->getRepository('AppBundle:Team')->find(
            $game->getTeam2()
        );
        $deleteForm = $this->createDeleteForm($teamId, $gameId);
        $editForm = $this->createForm(new GameType(), $game);

        if ($request->getMethod() == 'POST') {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($game);
                $em->flush();

                return $this->redirectToRoute('games', array(
                    'teamId' => $teamId,
                    'gameId' => $gameId
                ));
            }
        }


        return $this->render("AppBundle:Game:edit-game.html.twig", array(
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'id' => $gameId,
            'game' => $games[$gameId-1],
            'team2' => $team2->getName()
        ));
    }
}
