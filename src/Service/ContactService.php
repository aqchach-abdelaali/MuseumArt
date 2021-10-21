<?php

namespace App\Service;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class ContactService
{
    private EntityManagerInterface $manager;
    private FlashBagInterface $flashBag;

    public function __construct(EntityManagerInterface $manager, FlashBagInterface $flashBag)
    {
        $this->manager = $manager;
        $this->flashBag = $flashBag;
    }

    public function persistContact(Contact $contact): void
    {
        $contact->setIsSend(false)
            ->setCreatedAt(new \DateTime('now'));

        $this->manager->persist($contact);
        $this->manager->flush();
        $this->flashBag->add('success', 'Votre message est envoyé, merci.');
    }

    public function isSend(Contact $contact)
    {
        $contact->setIsSend(true);

        $this->manager->persist($contact);
        $this->manager->flush();
    }
}
