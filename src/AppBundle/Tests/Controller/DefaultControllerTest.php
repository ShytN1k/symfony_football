<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBase;

class DefaultControllerTest extends TestBase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Homepage', $crawler->filter('ul li a')->text());
        $this->assertContains('National Football Team', $crawler->filter('')->text());
        $this->assertCount(25, $crawler->filter('ul li'));
    }
}
