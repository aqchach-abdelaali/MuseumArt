<?php

namespace App\Tests;

use App\Entity\Blogpost;
use PHPUnit\Framework\TestCase;

class BlogpostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogpost = new Blogpost();
        $datetime = new \DateTime();

        $blogpost->setTitre('titre')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug');

        $this->assertTrue('titre' === $blogpost->getTitre());
        $this->assertTrue($blogpost->getCreatedAt() === $datetime);
        $this->assertTrue('contenu' === $blogpost->getContenu());
        $this->assertTrue('slug' === $blogpost->getSlug());
    }

    public function testIsFalse()
    {
        $blogpost = new Blogpost();
        $datetime = new \DateTime();

        $blogpost->setTitre('titre')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug');

        $this->assertFalse('falsetitre' === $blogpost->getTitre());
        $this->assertFalse($blogpost->getCreatedAt() === new \DateTime());
        $this->assertFalse('falsecontenu' === $blogpost->getContenu());
        $this->assertFalse('falsreslug' === $blogpost->getSlug());
    }

    public function testIsEmpty()
    {
        $blogpost = new Blogpost();

        $this->assertEmpty($blogpost->getTitre());
        $this->assertEmpty($blogpost->getCreatedAt());
        $this->assertEmpty($blogpost->getContenu());
        $this->assertEmpty($blogpost->getSlug());
    }
}
