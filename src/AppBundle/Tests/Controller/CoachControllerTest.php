<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Tests\TestBase;

class CoachControllerTest extends TestBase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Ukraine/coach2');

        $this->assertContains('Ukraine', $crawler->filter('')->text());
//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('First name: ', $crawler->filter('')->text());
        $this->assertContains('Last name: ', $crawler->filter('')->text());
        $this->assertContains('Age: ', $crawler->filter('')->text());
        $this->assertContains('Expirience: ', $crawler->filter('')->text());
        $this->assertContains('Nationality: ', $crawler->filter('')->text());
        $this->assertContains('Summary: ', $crawler->filter('')->text());
    }
}
