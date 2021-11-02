<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\Commentaire;
use App\Entity\Peinture;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $commentaire = new Commentaire();
        $datetime = new \DateTime();
        $blogpost = new Blogpost();
        $peinture = new Peinture();

        $commentaire->setAuteur('auteur')
            ->setEmail('baali@test.com')
            ->setCreatedAt($datetime)
            ->setContenu('contenu')
            ->setBlogpost($blogpost)
            ->setPeinture($peinture);

        $this->assertTrue('auteur' === $commentaire->getAuteur());
        $this->assertTrue('baali@test.com' === $commentaire->getEmail());
        $this->assertTrue($commentaire->getCreatedAt() === $datetime);
        $this->assertTrue('contenu' === $commentaire->getContenu());
        $this->assertTrue($commentaire->getBlogpost() === $blogpost);
        $this->assertTrue($commentaire->getPeinture() === $peinture);
    }

    public function testIsFalse()
    {
        $commentaire = new Commentaire();
        $datetime = new \DateTime();
        $blogpost = new Blogpost();
        $peinture = new Peinture();

        $commentaire->setAuteur('auteur')
            ->setEmail('baali@test.com')
            ->setCreatedAt(new \DateTime())
            ->setContenu('contenu')
            ->setBlogpost(new Blogpost())
            ->setPeinture(new Peinture());

        $this->assertFalse('falseauteur' === $commentaire->getAuteur());
        $this->assertFalse('falsebaali@test.com' === $commentaire->getEmail());
        $this->assertFalse($commentaire->getCreatedAt() === $datetime);
        $this->assertFalse('falsecontenu' === $commentaire->getContenu());
        $this->assertFalse($commentaire->getBlogpost() === $blogpost);
        $this->assertFalse($commentaire->getPeinture() === $peinture);
    }

    public function testIsEmpty()
    {
        $commentaire = new Commentaire();

        $this->assertEmpty($commentaire->getId());
        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEmail());
        $this->assertEmpty($commentaire->getCreatedAt());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getBlogpost());
        $this->assertEmpty($commentaire->getPeinture());
    }
}
