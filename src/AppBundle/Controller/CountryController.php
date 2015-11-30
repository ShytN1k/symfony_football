<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Country;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker;

class CountryController extends Controller
{
    /**
     * @Route("/{teamname}/{countryName}", name="countries", requirements={"countryName" = "[_a-zA-Z]+"})
     * @Method("GET")
     *
     * @param $teamname
     * @param $country
     * @return Response
     */
    public function indexAction($teamname, $countryName)
    {
        $faker = Faker\Factory::create();

        $country = new Country();
        $country->setName($countryName);
        $country->setSummary($faker->paragraph(5));

        return $this->render("AppBundle:Country:index.html.twig", array(
            'teamname' => $teamname,
            'country' => $country
        ));
    }
}
