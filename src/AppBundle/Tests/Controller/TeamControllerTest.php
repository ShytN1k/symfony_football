<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBase;

class TeamControllerTest extends TestBase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/team5');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Head coach', $crawler->filter('')->text());
        $this->assertContains('Country:', $crawler->filter('')->text());
        $this->assertContains('Players:', $crawler->filter('')->text());
        $this->assertContains('Coaching stuff:', $crawler->filter('')->text());
        $this->assertContains('Last games:', $crawler->filter('')->text());
    }
}
