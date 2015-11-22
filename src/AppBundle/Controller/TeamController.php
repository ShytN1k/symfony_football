<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
        return new Response('<!DOCTYPE html>
                             <html>
                                <head>
                                    <meta charset="UTF-8">
                                </head>
                                <body>
                                    Country:
                                    <a href="/'. $teamname. '/'. $teamname. '">'.$teamname.'</a>
                                    <br>
                                    <hr>
                                    Players:
                                    <br>
                                    <a href="/'. $teamname. '/player1">Player 1</a><br>
                                    <a href="/'. $teamname. '/player2">Player 2</a><br>
                                    <a href="/'. $teamname. '/player3">Player 3</a><br>
                                    <a href="/'. $teamname. '/player4">Player 4</a><br>
                                    <a href="/'. $teamname. '/player5">Player 5</a><br>
                                    <a href="/'. $teamname. '/player6">Player 6</a><br>
                                    <a href="/'. $teamname. '/player7">Player 7</a><br>
                                    <a href="/'. $teamname. '/player8">Player 8</a><br>
                                    <a href="/'. $teamname. '/player9">Player 9</a><br>
                                    <a href="/'. $teamname. '/player10">Player 10</a><br>
                                    <a href="/'. $teamname. '/player11">Player 11</a><br>
                                    <hr>
                                    Coaching stuff:
                                    <br>
                                    <a href="/'. $teamname. '/coach1">Head coach</a><br>
                                    <a href="/'. $teamname. '/coach2">Assistant coach 1</a><br>
                                    <a href="/'. $teamname. '/coach3">Assistant coach 2</a><br>
                                    <hr>
                                    Last games:
                                    <br>
                                    <a href="/'. $teamname. '/game1">Game 1</a><br>
                                    <a href="/'. $teamname. '/game2">Game 2</a><br>
                                    <a href="/'. $teamname. '/game3">Game 3</a><br>
                                    <hr>
                                    <a href="/">To main menu</a>
                                </body>
                             </html>');
    }
}
