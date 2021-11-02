<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PeintureFunctionalTest extends WebTestCase
{
    public function testShouldDispalyPeinture(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/realisations');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Dernières réalisations');
    }

    public function testShouldDispalyOnePeinture(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/realisations/peinture-slug');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Peinture test');
    }
}
