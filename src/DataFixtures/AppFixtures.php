<?php

namespace App\DataFixtures;

use App\Entity\Blogpost;
use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Utilisation de faker
        $faker = Factory::create('fr_FR');

        // Creation d'un utilisateur
        $user = new User();

        $user->setEmail('baali@example.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setTelephone($faker->phoneNumber())
            ->setAPropos($faker->text())
            ->setInstagram('Instagram');

        $password = $this->encoder->encodePassword($user, 'test');
        $user->setPassword($password);

        $manager->persist($user);

        // Creation de 10 Blogpost

        for ($i = 0; $i < 10; ++$i) {
            $blogpost = new Blogpost();

            $blogpost->setTitre($faker->word(4, true))
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setContenu($faker->text(350))
                ->setSlug($faker->slug(4))
                ->setUser($user);

            $manager->persist($blogpost);
        }

        // Creation de catégories
        for ($k = 0; $k < 5; ++$k) {
            $categorie = new Categorie();

            $categorie->setNom($faker->word())
                ->setDescription($faker->words(10, true))
                ->setSlug($faker->slug());

            $manager->persist($categorie);

            // Creation de 2 Peintures/catégoris
            for ($j = 0; $j < 2; ++$j) {
                $peinture = new Peinture();

                $peinture->setNom($faker->words(3, true))->setLargeur($faker->randomFloat(2, 20, 60))
                    ->setHauteur($faker->randomFloat(2, 20, 60))
                    ->setEnVente($faker->randomElement([true, false]))
                    ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'))
                    ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setDescription($faker->text())
                    ->setPortfolio($faker->randomElement([true, false]))
                    ->setSlug($faker->slug())
                    ->setFile('/img/banjo.jpg')
                    ->setPrix($faker->randomFloat(2, 100, 9999))
                    ->setUser($user)
                    ->addCategorie($categorie);

                $manager->persist($peinture);
            }
        }

        $manager->flush();
    }
}
