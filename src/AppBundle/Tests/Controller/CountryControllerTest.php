<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CountryControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Ukraine/Ukraine');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Ukraine information', $crawler->filter('')->text());
    }
}
