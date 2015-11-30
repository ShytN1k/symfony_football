<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Republic_of_Ireland/game3');

        $this->assertContains('Republic of Ireland', $crawler->filter('')->text());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Team 1: Republic of Ireland', $crawler->filter('')->text());
        $this->assertContains('Team 2: ', $crawler->filter('')->text());
        $this->assertContains('Stadium: ', $crawler->filter('')->text());
        $this->assertContains('Date: ', $crawler->filter('')->text());
        $this->assertContains('Summary: ', $crawler->filter('')->text());
    }
}
