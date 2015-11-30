<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker;

class GameController extends Controller
{
    /**
     * @Route("/{teamname}/game{id}", name="games", requirements={"id" = "[0-9]+"})
     * @Method("GET")
     *
     * @param $id
     * @return Response
     */
    public function indexAction($teamname, $id)
    {
        $faker = Faker\Factory::create();

        $teamnameReplaced = preg_replace('/_/', ' ', $teamname);
        $game = new Game();
        $game->setId($id);
        $game->setStadium($faker->country);
        $game->setTeam1($teamnameReplaced);
        $game->setTeam2('Team '. $faker->numberBetween(1, 24));
        $game->setDate($faker->dateTimeThisYear);
        $game->setSummary($faker->paragraph(5));

        return $this->render("AppBundle:Game:index.html.twig", array(
            'teamname' => $teamname,
            'teamnameReplaced' => $teamnameReplaced,
            'game' => $game
        ));
    }
}
