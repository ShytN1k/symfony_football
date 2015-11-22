<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TeamControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Ukraine');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Ukraine', $crawler->filter('a')->text());
        $this->assertContains('Head coach', $crawler->filter('')->text());
        $this->assertCount(19, $crawler->filter('a'));
    }
}
