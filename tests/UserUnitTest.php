<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\Peinture;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('baali@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a propos')
            ->setInstagram('instagram')
            ->setTelephone('0632598741')
            ->setRoles(['ROLE_TEST']);

        $this->assertTrue('baali@test.com' === $user->getEmail());
        $this->assertTrue('prenom' === $user->getPrenom());
        $this->assertTrue('nom' === $user->getNom());
        $this->assertTrue('password' === $user->getPassword());
        $this->assertTrue('a propos' === $user->getAPropos());
        $this->assertTrue('instagram' === $user->getInstagram());
        $this->assertTrue('0632598741' === $user->getTelephone());
        $this->assertTrue(['ROLE_TEST', 'ROLE_USER'] === $user->getRoles());
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('baali@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a propos')
            ->setInstagram('instagram')
            ->setTelephone('0632598741');

        $this->assertFalse('false@test.com' === $user->getEmail());
        $this->assertFalse('false' === $user->getPrenom());
        $this->assertFalse('false' === $user->getNom());
        $this->assertFalse('false' === $user->getPassword());
        $this->assertFalse('a false' === $user->getAPropos());
        $this->assertFalse('false' === $user->getInstagram());
        $this->assertFalse('025896314' === $user->getTelephone());
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getId());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getInstagram());
        $this->assertEmpty($user->getTelephone());
        $this->assertEmpty($user->getUsername());
        $this->assertEmpty($user->getUserIdentifier());
    }

    public function testAddGetRemovePeinture()
    {
        $user = new User();
        $peinture = new Peinture();

        $this->assertEmpty($user->getPeintures());

        $user->addPeinture($peinture);
        $this->assertContains($peinture, $user->getPeintures());

        $user->removePeinture($peinture);
        $this->assertEmpty($user->getPeintures());
    }

    public function testAddGetRemoveBlogpost()
    {
        $user = new User();
        $blogpost = new Blogpost();

        $this->assertEmpty($user->getBlogposts());

        $user->addBlogpost($blogpost);
        $this->assertContains($blogpost, $user->getBlogposts());

        $user->removeBlogpost($blogpost);
        $this->assertEmpty($user->getBlogposts());
    }
}
