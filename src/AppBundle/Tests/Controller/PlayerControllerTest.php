<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlayerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Ukraine/player11');

//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Ukraine', $crawler->filter('')->text());
        $this->assertContains('First name: ', $crawler->filter('')->text());
        $this->assertContains('Last name: ', $crawler->filter('')->text());
        $this->assertContains('Number: ', $crawler->filter('')->text());
        $this->assertContains('Birthday: ', $crawler->filter('')->text());
        $this->assertContains('Nationality: ', $crawler->filter('')->text());
        $this->assertContains('Summary: ', $crawler->filter('')->text());
    }
}
