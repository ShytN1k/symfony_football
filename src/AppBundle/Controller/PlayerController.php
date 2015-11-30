<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Player;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker;

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
        $faker = Faker\Factory::create();

        $player = new Player();
        $player->setId($id);
        $player->setName($faker->firstNameMale);
        $player->setLastname($faker->lastName);
        $player->setNumber($faker->numberBetween(1, 99));
        $player->setBirthday($faker->dateTimeBetween('-35 years', '-20 years'));
        $player->setNationality($faker->country);
        $player->setSummary($faker->paragraph(5));

        return $this->render("AppBundle:Player:index.html.twig", array(
            'teamname' => $teamname,
            'player' => $player
        ));
    }
}
