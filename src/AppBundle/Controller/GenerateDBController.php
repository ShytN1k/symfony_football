<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Coach;
use AppBundle\Entity\Country;
use AppBundle\Entity\Game;
use AppBundle\Entity\Player;
use AppBundle\Entity\Team;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Faker;

class GenerateDBController extends Controller
{
    /**
     * @Route("/generator", name="generator")
     * @Method("GET")
     */
    public function indexAction()
    {
        $teamUrls = array(
            "Albania",
            "Austria",
            "Belgium",
            "Croatia",
            "Czech_Republic",
            "England",
            "France",
            "Germany",
            "Hungary",
            "Iceland",
            "Italy",
            "Northern_Ireland",
            "Poland",
            "Portugal",
            "Republic_Of_Ireland",
            "Romania",
            "Russia",
            "Slovakia",
            "Spain",
            "Sweden",
            "Switzerland",
            "Turkey",
            "Ukraine",
            "Wales"
        );
        $teamNames = $counties = $players = $coaches = $games = array();
        foreach ($teamUrls as $teamUrl) {
            array_push($teamNames, preg_replace('/_/', ' ', $teamUrl));
        }

        $faker = Faker\Factory::create();
        $teams = array();

        for ($i = 0; $i < count($teamNames); $i++) {
            $team = new Team();
            $team->setName($teamNames[$i]);
            $team->setUrl($teamUrls[$i]);
            $team->setSquadNumber($faker->numberBetween(20, 25));
            $team->setStaffNumber($faker->numberBetween(5, 10));

            array_push($teams, $team);
        }

        $em = $this->getDoctrine()->getManager();

        foreach ($teams as $team) {
            $em->persist($team);
        }

        /**
         * @var Team $team
         */
        foreach ($teams as $team) {
            $country = new Country();
            $country->setName($team->getName());
            $country->setSummary($faker->paragraph(5));
            $country->setTeam($team);
            array_push($counties, $country);

            for ($i = 0; $i < $team->getSquadNumber(); $i++) {
                $player = new Player();
                $player->setName($faker->firstNameMale);
                $player->setLastname($faker->lastName);
                $player->setNumber($faker->numberBetween(1, 99));
                $player->setBirthday($faker->dateTimeBetween('-35 years', '-20 years'));
                $player->setNationality($faker->country);
                $player->setSummary($faker->paragraph(5));
                $player->setTeam($team);
                array_push($players, $player);
            }

            for ($i = 0; $i < $team->getStaffNumber(); $i++) {
                $coach = new Coach();
                $coach->setName($faker->firstNameMale);
                $coach->setLastname($faker->lastName);
                $coach->setExpirience($faker->numberBetween(20, 40));
                $coach->setAge($faker->numberBetween(40, 60));
                $coach->setNationality($faker->country);
                $coach->setSummary($faker->paragraph(5));
                $coach->setTeam($team);
                array_push($coaches, $coach);
            }

            for ($i = 0; $i < 5; $i++) {
                $game = new Game();
                $game->setStadium($faker->country);
                $game->setTeam1($team->getName());
                $game->setTeam2($faker->numberBetween(1, 24));
                $game->setDate($faker->dateTimeThisYear);
                $game->setSummary($faker->paragraph(5));
                $game->setTeam($team);
                array_push($games, $game);
            }
        }

        foreach ($counties as $country) {
            $em->persist($country);
        }

        foreach ($players as $player) {
            $em->persist($player);
        }

        foreach ($coaches as $coach) {
            $em->persist($coach);
        }

        foreach ($games as $game) {
            $em->persist($game);
        }

        $em->flush();

        return $this->render("AppBundle:GenerateDB:index.html.twig");
    }
}