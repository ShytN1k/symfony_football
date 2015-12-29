<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use AppBundle\Form\TeamType;
use AppBundle\Repositories\TeamRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    /**
     * @Route("/team{teamId}", name="teams", requirements={"teamId" = "[0-9]+"})
     * @Method("GET")
     *
     * @param $teamId
     * @return Response
     */
    public function indexAction($teamId)
    {
        /** @var TeamRepository $teams */
        $teams = $this->getDoctrine()->getRepository('AppBundle:Team')->getTeamDeps($teamId);

        return $this->render("AppBundle:Team:index.html.twig", array(
            'team' => $teams[0]
        ));
    }

    /**
     * @Route("/create-team", name="create-team")
     * @Method({"GET", "POST"})
     *
     * @return Response
     */
    public function createTeamAction(Request $request)
    {
        $team = new Team();
        $form = $this->createForm(new TeamType(), $team);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($team);
                $em->flush();

                return $this->redirectToRoute('teams', array('teamId' => $team->getId()));
            }
        }


        return $this->render("AppBundle:Team:create-team.html.twig", array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/team/{id}", name="team-delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Team $team)
    {
        $form = $this->createDeleteForm($team);

        if ($request->getMethod() == 'DELETE') {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->remove($team);
            $em->flush();
        }

        return $this->redirectToRoute('homepage');
    }

    /**
     * @param Team $team
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm(Team $team)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('team-delete', array('id' => $team->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * @Route("/team{teamId}/edit", name="edit-team", requirements={"teamId" = "[0-9]+"})
     * @Method({"GET", "POST"})
     */
    public function editTeamAction(Request $request, $teamId)
    {
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->find($teamId);
        $deleteForm = $this->createDeleteForm($team);
        $editForm = $this->createForm(new TeamType(), $team);

        if ($request->getMethod() == 'POST') {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($team);
                $em->flush();

                return $this->redirectToRoute('teams', array('teamId' => $team->getId()));
            }
        }


        return $this->render("AppBundle:Team:edit-team.html.twig", array(
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }
}
