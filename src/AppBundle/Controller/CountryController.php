<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Team;
use AppBundle\Entity\Country;
use AppBundle\Form\CountryType;
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

    /**
     * @Route("/team{teamId}/create-country", name="create-country", requirements={
     *      "teamId" = "[0-9]+",
     * })
     * @Method({"GET", "POST"})
     *
     * @return Response
     */
    public function createCountryAction(Request $request, $teamId)
    {
        /** @var Team $team */
        $team = $this->getDoctrine()->getRepository('AppBundle:Team')->find($teamId);
        $countries = $this->getDoctrine()->getRepository('AppBundle:Country')->findAll();

        $country = new Country();
        $form = $this->createForm(new CountryType(), $country);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $country->setTeam($team);
                $em = $this->getDoctrine()->getManager();
                $em->persist($country);
                $em->flush();

                return $this->redirectToRoute('countries', array(
                    'teamId' => $teamId,
                    'countryId' => $country->getId()
                ));
            }
        }


        return $this->render("AppBundle:Country:create-country.html.twig", array(
            'form' => $form->createView(),
            'team' => $team
        ));
    }

    /**
     * @Route("/team{teamId}/country{countryId}-delete", name="country-delete", requirements={
     *      "teamId" = "[0-9]+",
     *      "countryId" = "[0-9]+"
     * })
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $teamId, $countryId)
    {
        $country = $this->getDoctrine()->getRepository('AppBundle:Country')->find($countryId);
        $form = $this->createDeleteForm($teamId, $countryId);

        if ($request->getMethod() == 'DELETE') {
            $form->handleRequest($request);
            $em = $this->getDoctrine()->getManager();
            $em->remove($country);
            $em->flush();
        }

        return $this->redirectToRoute('teams', array('teamId' => $teamId));
    }

    /**
     * @param $teamId
     * @param $countryId
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm($teamId, $countryId)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('country-delete', array(
                'teamId' => $teamId,
                'countryId' => $countryId
            )))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * @Route("/team{teamId}/country{countryId}/edit", name="edit-country", requirements={
     *      "teamId" = "[0-9]+",
     *      "countryId" = "[0-9]+"
     * })
     * @Method({"GET", "POST"})
     */
    public function editcountryAction(Request $request, $teamId, $countryId)
    {
        $country = $this->getDoctrine()->getRepository('AppBundle:Country')->find($countryId);
        $deleteForm = $this->createDeleteForm($teamId, $countryId);
        $editForm = $this->createForm(new CountryType(), $country);

        if ($request->getMethod() == 'POST') {
            $editForm->handleRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($country);
                $em->flush();

                return $this->redirectToRoute('countries', array(
                    'teamId' => $teamId,
                    'countryId' => $countryId
                ));
            }
        }


        return $this->render("AppBundle:Country:edit-country.html.twig", array(
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'id' => $countryId,
            'country' => $country
        ));
    }
}
