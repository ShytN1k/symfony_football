<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlayerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Ukraine/player11');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Information about player 11.', $crawler->filter('')->text());
    }
}
