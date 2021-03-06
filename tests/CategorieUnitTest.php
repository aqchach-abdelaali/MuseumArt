<?php

namespace App\Tests;

use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class CategorieUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $catrgorie = new Categorie();

        $catrgorie->setNom('nom')
            ->setDescription('description')
            ->setSlug('slug');

        $this->assertTrue('nom' === $catrgorie->getNom());
        $this->assertTrue('description' === $catrgorie->getDescription());
        $this->assertTrue('slug' === $catrgorie->getSlug());
    }

    public function testIsFalse(): void
    {
        $catrgorie = new Categorie();

        $catrgorie->setNom('nom')
            ->setDescription('decription')
            ->setSlug('slug');

        $this->assertFalse('false' === $catrgorie->getNom());
        $this->assertFalse('descriptionFalse' === $catrgorie->getDescription());
        $this->assertFalse('slugFalse' === $catrgorie->getSlug());
    }

    public function testIsEmpty(): void
    {
        $catrgorie = new Categorie();

        $this->assertEmpty($catrgorie->getNom());
        $this->assertEmpty($catrgorie->getDescription());
        $this->assertEmpty($catrgorie->getSlug());
    }
}
