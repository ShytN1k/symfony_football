<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    /**
     * @Route("/{teamname}/{country}", name="countries", requirements={"country" = "[_a-zA-Z]+"})
     * @Method("GET")
     *
     * @param $country
     * @return Response
     */
    public function indexAction($country)
    {
        return new Response('<!DOCTYPE html>
                             <html>
                                <head>
                                    <meta charset="UTF-8">
                                </head>
                                <body>
                                    <h3>'.$country. ' information</h3>
                                    <hr>
                                    <a href="/">To main menu</a>
                                </body>
                             </html>');
    }
}
