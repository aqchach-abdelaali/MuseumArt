<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\Commentaire;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class BlogpostUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blogpost = new Blogpost();
        $datetime = new \DateTime();
        $user = new User();

        $blogpost->setTitre('titre')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setUser($user);

        $this->assertTrue('titre' === $blogpost->getTitre());
        $this->assertTrue($blogpost->getCreatedAt() === $datetime);
        $this->assertTrue('contenu' === $blogpost->getContenu());
        $this->assertTrue('slug' === $blogpost->getSlug());
        $this->assertTrue($blogpost->getUser() === $user);
    }

    public function testIsFalse()
    {
        $blogpost = new Blogpost();
        $datetime = new \DateTime();
        $user = new User();

        $blogpost->setTitre('titre')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setUser($user);

        $this->assertFalse('falsetitre' === $blogpost->getTitre());
        $this->assertFalse($blogpost->getCreatedAt() === new \DateTime());
        $this->assertFalse('falsecontenu' === $blogpost->getContenu());
        $this->assertFalse('falsreslug' === $blogpost->getSlug());
        $this->assertFalse($blogpost->getUser() === new User());
    }

    public function testIsEmpty()
    {
        $blogpost = new Blogpost();

        $this->assertEmpty($blogpost->getTitre());
        $this->assertEmpty($blogpost->getCreatedAt());
        $this->assertEmpty($blogpost->getContenu());
        $this->assertEmpty($blogpost->getSlug());
        $this->assertEmpty($blogpost->getId());
    }

    public function testAddGetRemoveCommentaire()
    {
        $blogpodt = new Blogpost();
        $commentaire = new Commentaire();

        $this->assertEmpty($blogpodt->getCommentaires());

        $blogpodt->addCommentaire($commentaire);
        $this->assertContains($commentaire, $blogpodt->getCommentaires());

        $blogpodt->removeCommentaire($commentaire);
        $this->assertEmpty($blogpodt->getCommentaires());
    }
}
