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
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->findOneBy(array('url' => $teamname));
        /** @var Coach $coach */
        $coaches = $this->getDoctrine()->getRepository('AppBundle:Coach')->findBy(array('team' => $team));

        return $this->render("AppBundle:Coach:index.html.twig", array(
            'id' => $id,
            'coach' => $coaches[$id-1]
        ));
    }
}
