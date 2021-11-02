<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogPostFunctionalTest extends WebTestCase
{
    public function testShouldDispalyBlogpost()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/actualites');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Dernières actualitées');
    }

    public function testShouldDispalyOneBlogpost(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/actualites/blogpost-test');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Blogpost test');
    }
}
