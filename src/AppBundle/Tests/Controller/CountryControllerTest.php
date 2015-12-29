<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBase;

class CountryControllerTest extends TestBase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/team11/country11');
        echo $crawler->filter('')->text();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Country: ', $crawler->filter('')->text());
        $this->assertContains('Summary: ', $crawler->filter('')->text());
    }
}
