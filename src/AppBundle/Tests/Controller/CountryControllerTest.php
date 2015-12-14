<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBase;

class CountryControllerTest extends TestBase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Northern_Ireland/Northern_Ireland');
        echo $crawler->filter('')->text();

//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Northern Ireland', $crawler->filter('')->text());
        $this->assertContains('Country: ', $crawler->filter('')->text());
        $this->assertContains('Summary: ', $crawler->filter('')->text());
    }
}
