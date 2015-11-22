<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function indexAction()
    {
        return new Response('<!DOCTYPE html>
                             <html>
                                <head>
                                    <meta charset="UTF-8">
                                </head>
                                <body>
                                    <ul>
                                        <li>
                                            <a href="/Albania">Albania National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Austria">Austria National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Belgium">Belgium National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Croatia">Croatia National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Czech_Republic">Czech Republic National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/England">England National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/France">France National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Germany">Germany National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Hungary">Hungary National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Iceland">Iceland National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Italy">Italy National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Northern_Ireland">Northern Ireland National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Poland">Poland National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Portugal">Portugal National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Republic_Of_Ireland">Republic Of Ireland National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Romania">Romania National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Russia">Russia National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Slovakia">Slovakia National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Spain">Spain National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Sweden">Sweden National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Switzerland">Switzerland National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Turkey">Turkey National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Ukraine">Ukraine National Football Team</a>
                                        </li>
                                        <li>
                                            <a href="/Wales">Wales National Football Team</a>
                                        </li>
                                    </ul>
                                </body>
                             </html>'
        );
    }
}
