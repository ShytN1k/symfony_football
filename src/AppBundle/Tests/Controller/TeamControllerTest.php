<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Ukraine');

        $this->assertContains('Ukraine', $crawler->filter('')->text());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Head coach', $crawler->filter('')->text());
        $this->assertContains('Country:', $crawler->filter('')->text());
        $this->assertContains('Players:', $crawler->filter('')->text());
        $this->assertContains('Coaching stuff:', $crawler->filter('')->text());
        $this->assertContains('Last games:', $crawler->filter('')->text());
    }
}
