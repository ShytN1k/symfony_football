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
     * @Route("/team{teamId}/country{countryId}", name="countries", requirements={
     *      "teamId" = "[0-9]+",
     *      "countryId" = "[0-9]+"
     * })
     * @Method("GET")
     *
     * @param $countryId
     * @return Response
     */
    public function indexAction($countryId)
    {
        /** @var Country $country */
        $country = $this->getDoctrine()->getRepository('AppBundle:Country')->find($countryId);

        return $this->render("AppBundle:Country:index.html.twig", array(
            'country' => $country
        ));
    }
}
