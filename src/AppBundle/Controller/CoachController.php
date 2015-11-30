<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Coach;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Faker;

class CoachController extends Controller
{
    /**
     * @Route("/{teamname}/coach{id}", name="coaches", requirements={"id" = "[0-9]+"})
     * @Method("GET")
     *
     * @param $teamname
     * @param $id
     * @return Response
     */
    public function indexAction($teamname, $id)
    {
        $faker = Faker\Factory::create();

        $coach = new Coach();
        $coach->setId($id);
        $coach->setName($faker->firstNameMale);
        $coach->setLastname($faker->lastName);
        $coach->setExpirience($faker->numberBetween(20, 40));
        $coach->setAge($faker->numberBetween(40, 60));
        $coach->setNationality($faker->country);
        $coach->setSummary($faker->paragraph(5));

        return $this->render("AppBundle:Coach:index.html.twig", array(
            'teamname' => $teamname,
            'coach' => $coach
        ));
    }
}
