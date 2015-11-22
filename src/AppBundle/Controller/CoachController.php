<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CoachController extends Controller
{
    /**
     * @Route("/{teamname}/coach{id}", name="coaches", requirements={"id" = "[0-9]+"})
     * @Method("GET")
     *
     * @param $id
     * @return Response
     */
    public function indexAction($id)
    {
        return new Response('<!DOCTYPE html>
                             <html>
                                <head>
                                    <meta charset="UTF-8">
                                </head>
                                <body>
                                    <h3>Information about coach '. $id.'.</h3>
                                    <hr>
                                    <a href="/">To main menu</a>
                                </body>
                             </html>');
    }
}
