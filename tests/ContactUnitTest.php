<?php

namespace App\Tests;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $contact = new Contact();
        $date = new \DateTime();

        $contact->setEmail('baali@test.com')
            ->setNom('nom')
            ->setMessage('message')
            ->setIsSend(true)
            ->setCreatedAt($date)
        ;

        $this->assertTrue('baali@test.com' === $contact->getEmail());
        $this->assertTrue('nom' === $contact->getNom());
        $this->assertTrue('message' === $contact->getMessage());
        $this->assertTrue(true === $contact->getIsSend());
        $this->assertTrue($contact->getCreatedAt() === $date);
    }

    public function testIsFalse()
    {
        $contact = new Contact();
        $date = new \DateTime();

        $contact->setEmail('baali@test.com')
            ->setNom('nom')
            ->setMessage('message')
            ->setIsSend(true)
            ->setCreatedAt($date)
        ;

        $this->assertFalse('false@test.com' === $contact->getEmail());
        $this->assertFalse('false' === $contact->getNom());
        $this->assertFalse('messagefalse' === $contact->getMessage());
        $this->assertFalse(false === $contact->getIsSend());
        $this->assertFalse($contact->getCreatedAt() === new \DateTime());
    }

    public function testIsEmpty()
    {
        $contact = new Contact();

        $this->assertEmpty($contact->getId());
        $this->assertEmpty($contact->getNom());
        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getIsSend());
        $this->assertEmpty($contact->getCreatedAt());
    }
}
