<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
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
        /** @var Coach $coach */
        $coach = $this->getDoctrine()->getRepository('AppBundle:Coach')->getTeamCoachs($teamname);

        return $this->render("AppBundle:Coach:index.html.twig", array(
            'id' => $id,
            'coach' => $coach[$id-1]
        ));
    }
}
