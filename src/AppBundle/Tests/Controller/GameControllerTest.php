<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBase;

class GameControllerTest extends TestBase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/team23/game3');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Team 1: ', $crawler->filter('')->text());
        $this->assertContains('Team 2: ', $crawler->filter('')->text());
        $this->assertContains('Stadium: ', $crawler->filter('')->text());
        $this->assertContains('Date: ', $crawler->filter('')->text());
        $this->assertContains('Summary: ', $crawler->filter('')->text());
    }
}
