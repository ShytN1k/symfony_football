<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CoachControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Republic_of_Ireland/coach2');

        $this->assertContains('Republic of Ireland', $crawler->filter('')->text());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('First name: ', $crawler->filter('')->text());
        $this->assertContains('Last name: ', $crawler->filter('')->text());
        $this->assertContains('Age: ', $crawler->filter('')->text());
        $this->assertContains('Expirience: ', $crawler->filter('')->text());
        $this->assertContains('Nationality: ', $crawler->filter('')->text());
        $this->assertContains('Summary: ', $crawler->filter('')->text());
    }
}
