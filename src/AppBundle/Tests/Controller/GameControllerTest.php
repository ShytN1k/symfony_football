<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Ukraine/game15');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Information about game 15.', $crawler->filter('')->text());
    }
}
