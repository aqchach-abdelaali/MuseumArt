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

        $this->assertTrue($catrgorie->getNom() === 'nom');
        $this->assertTrue($catrgorie->getDescription() === 'description');
        $this->assertTrue($catrgorie->getSlug() === 'slug');
    }

    public function testIsFalse(): void
    {
        $catrgorie = new Categorie();

        $catrgorie->setNom('nom')
            ->setDescription('decription')
            ->setSlug('slug');

        $this->assertFalse($catrgorie->getNom() === 'false');
        $this->assertFalse($catrgorie->getDescription() === 'descriptionFalse');
        $this->assertFalse($catrgorie->getSlug() === 'slugFalse');
    }

    public function testIsEmpty(): void
    {
        $catrgorie = new Categorie();

        $this->assertEmpty($catrgorie->getNom());
        $this->assertEmpty($catrgorie->getDescription());
        $this->assertEmpty($catrgorie->getSlug());
    }
}
