<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\Peinture;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PeintureUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $peinture = new Peinture();
        $datetime = new \DateTime();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
            ->setLargeur(20.20)
            ->setHauteur(20.20)
            ->setEnVente(true)
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setPrix(20.20)
            ->setUser($user);

        $this->assertTrue('nom' === $peinture->getNom());
        $this->assertTrue(20.20 == $peinture->getLargeur());
        $this->assertTrue(20.20 == $peinture->getHauteur());
        $this->assertTrue(true === $peinture->getEnVente());
        $this->assertTrue($peinture->getDateRealisation() === $datetime);
        $this->assertTrue($peinture->getCreatedAt() === $datetime);
        $this->assertTrue('description' === $peinture->getDescription());
        $this->assertTrue(true === $peinture->getPortfolio());
        $this->assertTrue('slug' === $peinture->getSlug());
        $this->assertTrue('file' === $peinture->getFile());
        $this->assertTrue(20.20 == $peinture->getPrix());
        $this->assertContains($categorie, $peinture->getCategorie());
        $this->assertTrue($peinture->getUser() === $user);
    }

    public function testIsFalse()
    {
        $peinture = new Peinture();
        $datetime = new \DateTime();
        $categorie = new Categorie();
        $user = new User();

        $peinture->setNom('nom')
            ->setLargeur(20.20)
            ->setHauteur(20.20)
            ->setEnVente(true)
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setPortfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setPrix(20.20)
            ->setUser($user);

        $this->assertFalse('falsenom' === $peinture->getNom());
        $this->assertFalse(22.20 == $peinture->getLargeur());
        $this->assertFalse(22.20 == $peinture->getHauteur());
        $this->assertFalse(false === $peinture->getEnVente());
        $this->assertFalse($peinture->getDateRealisation() === new \DateTime());
        $this->assertFalse($peinture->getCreatedAt() === new \DateTime());
        $this->assertFalse('Falsedescription' === $peinture->getDescription());
        $this->assertFalse(false === $peinture->getPortfolio());
        $this->assertFalse('falseslug' === $peinture->getSlug());
        $this->assertFalse('falsefile' === $peinture->getFile());
        $this->assertFalse(25.20 == $peinture->getPrix());
        $this->assertNotContains(new Categorie(), $peinture->getCategorie());
        $this->assertFalse($peinture->getUser() === new User());
    }

    public function testIsEmpty()
    {
        $peinture = new Peinture();

        $this->assertEmpty($peinture->getNom());
        $this->assertEmpty($peinture->getLargeur());
        $this->assertEmpty($peinture->getHauteur());
        $this->assertEmpty($peinture->getEnVente());
        $this->assertEmpty($peinture->getDateRealisation());
        $this->assertEmpty($peinture->getCreatedAt());
        $this->assertEmpty($peinture->getDescription());
        $this->assertEmpty($peinture->getPortfolio());
        $this->assertEmpty($peinture->getSlug());
        $this->assertEmpty($peinture->getFile());
        $this->assertEmpty($peinture->getPrix());
        $this->assertEmpty($peinture->getCategorie());
        $this->assertEmpty($peinture->getUser());
        $this->assertEmpty($peinture->getId());
    }

    public function testAddGetRemoveCommentaire()
    {
        $peinture = new Peinture();
        $commentaire = new Commentaire();

        $this->assertEmpty($peinture->getCommentaires());

        $peinture->addCommentaire($commentaire);
        $this->assertContains($commentaire, $peinture->getCommentaires());

        $peinture->removeCommentaire($commentaire);
        $this->assertEmpty($peinture->getCommentaires());
    }

    public function testAddGetRemoveCategorie()
    {
        $peinture = new Peinture();
        $categorie = new Categorie();

        $this->assertEmpty($peinture->getCategorie());

        $peinture->addCategorie($categorie);
        $this->assertContains($categorie, $peinture->getCategorie());

        $peinture->removeCategorie($categorie);
        $this->assertEmpty($peinture->getCategorie());
    }
}
