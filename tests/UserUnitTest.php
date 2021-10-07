<?php

namespace App\Tests;

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
            ->setInstagram('instagram');

        $this->assertTrue('baali@test.com' === $user->getEmail());
        $this->assertTrue('prenom' === $user->getPrenom());
        $this->assertTrue('nom' === $user->getNom());
        $this->assertTrue('password' === $user->getPassword());
        $this->assertTrue('a propos' === $user->getAPropos());
        $this->assertTrue('instagram' === $user->getInstagram());
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('baali@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setAPropos('a propos')
            ->setInstagram('instagram');

        $this->assertFalse('false@test.com' === $user->getEmail());
        $this->assertFalse('false' === $user->getPrenom());
        $this->assertFalse('false' === $user->getNom());
        $this->assertFalse('false' === $user->getPassword());
        $this->assertFalse('a false' === $user->getAPropos());
        $this->assertFalse('false' === $user->getInstagram());
    }

    public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getAPropos());
        $this->assertEmpty($user->getInstagram());
    }
}
