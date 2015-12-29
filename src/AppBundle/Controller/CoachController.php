<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use AppBundle\Entity\Coach;
use AppBundle\Form\CoachType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
        $coaches = $this->getDoctrine()->getRepository('AppBundle:Coach')->getTeamCoachs($teamId);

        return $this->render("AppBundle:Coach:index.html.twig", array(
            'id' => $coachId,
            'coach' => $coaches[$coachId-1]
        ));
    }

    /**
     * @Route("/team{teamId}/create-coach", name="create-coach", requirements={
     *      "teamId" = "[0-9]+",
     * })
     * @Method({"GET", "POST"})
     *
     * @return Response
     */
    public function createCoachAction(Request $request, $teamId)
    {
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->find($teamId);
        $coaches = $this->getDoctrine()->getRepository('AppBundle:Coach')->getTeamCoachs($teamId);

        $coach = new Coach();
        $form = $this->createForm(new CoachType(), $coach);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $coach->setTeam($team);
                $em = $this->getDoctrine()->getManager();
                $em->persist($coach);
                $em->flush();

                return $this->redirectToRoute('coaches', array(
                    'teamId' => $teamId,
                    'coachId' => count($coaches)+1
                ));
            }
        }


        return $this->render("AppBundle:Coach:create-coach.html.twig", array(
            'form' => $form->createView(),
            'coach' => $coaches[0]
        ));
    }

    /**
     * @Route("/team{teamId}/coach{coachId}-delete", name="coach-delete", requirements={
     *      "teamId" = "[0-9]+",
     *      "coachId" = "[0-9]+"
     * })
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $teamId, $coachId)
    {
        $coaches = $this->getDoctrine()->getRepository('AppBundle:Coach')->getTeamCoachs($teamId);
        $coach = $coaches[$coachId-1];
        $form = $this->createDeleteForm($teamId, $coachId);

        if ($request->getMethod() == 'DELETE') {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->remove($coach);
            $em->flush();
        }

        return $this->redirectToRoute('teams', array('teamId' => $teamId));
    }

    /**
     * @param $teamId
     * @param $coachId
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm($teamId, $coachId)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('coach-delete', array(
                'teamId' => $teamId,
                'coachId' => $coachId
            )))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * @Route("/team{teamId}/coach{coachId}/edit", name="edit-coach", requirements={
     *      "teamId" = "[0-9]+",
     *      "coachId" = "[0-9]+"
     * })
     * @Method({"GET", "POST"})
     */
    public function editCoachAction(Request $request, $teamId, $coachId)
    {
        /** @var Coach $coaches */
        $coaches = $this->getDoctrine()->getRepository('AppBundle:Coach')->getTeamCoachs($teamId);
        $coach = $coaches[$coachId-1];
        $deleteForm = $this->createDeleteForm($teamId, $coachId);
        $editForm = $this->createForm(new CoachType(), $coach);

        if ($request->getMethod() == 'POST') {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($coach);
                $em->flush();

                return $this->redirectToRoute('coaches', array(
                    'teamId' => $teamId,
                    'coachId' => $coachId
                ));
            }
        }


        return $this->render("AppBundle:Coach:edit-coach.html.twig", array(
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'id' => $coachId,
            'coach' => $coaches[$coachId-1]
        ));
    }
}
