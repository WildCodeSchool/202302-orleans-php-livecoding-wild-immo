<?php

namespace App\DataFixtures;

use App\Entity\Guide;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GuideFixtures extends Fixture
{
    public const GUIDE_NUMBER = 10;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < self::GUIDE_NUMBER; $i++) {
            $guide = new Guide();
            $guide->setTitle($faker->words(5, true))
                ->setContent($faker->text());
            $manager->persist($guide);
        }

        $manager->flush();
    }
}
