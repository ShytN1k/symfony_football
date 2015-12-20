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
     * @Route("/team{teamId}/coach{coachId}", name="coaches", requirements={
     *      "teamId" = "[0-9]+",
     *      "coachId" = "[0-9]+"
     * })
     * @Method("GET")
     *
     * @param $teamId
     * @param $coachId
     * @return Response
     */
    public function indexAction($teamId, $coachId)
    {
        /** @var Coach $coaches */
        $coaches = $this->getDoctrine()->getRepository('AppBundle:Coach')->getTeamCoachs($teamId);

        return $this->render("AppBundle:Coach:index.html.twig", array(
            'id' => $coachId,
            'coach' => $coaches[$coachId-1]
        ));
    }
}
