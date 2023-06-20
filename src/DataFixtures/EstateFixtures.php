<?php

namespace App\DataFixtures;

use App\Entity\Estate;
use Faker\Factory;
use App\Entity\Guide;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EstateFixtures extends Fixture
{
    public const ESTATE_NUMBER = 50;
    public const TITLES = [
        'Maison de ville',
        'Longère dans les bois',
        'Chalet vue sur la montagne',
        'Appartement hyper centre proche tous commerces',
        'Résidence de vacances vue sur mer',
    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::ESTATE_NUMBER; $i++) {
            $estate = new Estate();
            $estate
                ->setTitle($faker->randomElement(self::TITLES))
                ->setDescription($faker->text())
                ->setSurface($faker->numberBetween(10, 250))
                ->setAddress($faker->address())
                ->setCity($faker->city())
                ->setPrice($faker->numberBetween(10000, 2500000));
            $manager->persist($estate);
        }

        $manager->flush();
    }
}
