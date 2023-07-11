<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Guide;
use App\Entity\Estate;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\EstateCategoryFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EstateFixtures extends Fixture implements DependentFixtureInterface
{
    public const ESTATE_NUMBER = 10;
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
            $image = 'house' . $i . '.jpg';

            copy(
                'https://loremflickr.com/400/400/house',
                'public/uploads/estate/' . $image
            );

            $estateCategory = $this->getReference(
                'estate_category_' . rand(0, count(EstateCategoryFixtures::CATEGORIES) - 1)
            );
            $estate
                ->setTitle($faker->randomElement(self::TITLES))
                ->setDescription($faker->text())
                ->setSurface($faker->numberBetween(10, 250))
                ->setAddress($faker->address())
                ->setCity($faker->city())
                ->setPrice($faker->numberBetween(10000, 2500000))
                ->setImage($image)
                ->setLatitude($faker->latitude(42, 52))
                ->setLongitude($faker->longitude(-3, 7))
                ->setEstateCategory($estateCategory);
            $this->addReference('estate_' . $i, $estate);
            $manager->persist($estate);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EstateCategoryFixtures::class,
        ];
    }
}
