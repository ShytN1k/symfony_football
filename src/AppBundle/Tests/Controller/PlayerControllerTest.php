<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBase;

class PlayerControllerTest extends TestBase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/team2/player11');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('First name: ', $crawler->filter('')->text());
        $this->assertContains('Last name: ', $crawler->filter('')->text());
        $this->assertContains('Number: ', $crawler->filter('')->text());
        $this->assertContains('Birthday: ', $crawler->filter('')->text());
        $this->assertContains('Nationality: ', $crawler->filter('')->text());
        $this->assertContains('Summary: ', $crawler->filter('')->text());
    }
}
