<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CoachControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Ukraine/coach2');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Information about coach 2.', $crawler->filter('')->text());
    }
}
