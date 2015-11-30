<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker;

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
        $faker = Faker\Factory::create();

        $team = new Team();
        $team->setName($teamname);
        $team->setSquadNumber($faker->numberBetween(20, 25));
        $team->setStaffNumber($faker->numberBetween(5, 10));
        $teamnameReplaced = preg_replace('/_/', ' ', $teamname);
        return $this->render("AppBundle:Team:index.html.twig", array(
            'teamname' => $teamname,
            'teamnameReplaced' => $teamnameReplaced,
            'team' => $team
        ));
    }
}
