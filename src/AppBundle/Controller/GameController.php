<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{
    /**
     * @Route("/{teamname}/game{id}", name="games", requirements={"id" = "[0-9]+"})
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
                                    <h3>Information about game '. $id.'.</h3>
                                    <hr>
                                    <a href="/">To main menu</a>
                                </body>
                             </html>');
    }
}
