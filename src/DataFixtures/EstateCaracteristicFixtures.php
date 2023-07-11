<?php

namespace App\DataFixtures;

use App\Entity\Caracteristic;
use App\Entity\EstateCaracteristic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EstateCaracteristicFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < EstateFixtures::ESTATE_NUMBER; $i++) {
            $estate = $this->getReference('estate_' . $i);
            for ($j = 0; $j < 3; $j++) {
                $caracteristic = $this->getReference(
                    'caracteristic_' . rand(0, count(CaracteristicFixtures::CARACTERISTICS) - 1)
                );
                $estateCaracteristic = new EstateCaracteristic();
                $estateCaracteristic->setValue(rand(1, 10));
                $estateCaracteristic->setCaracteristic($caracteristic);
                $estateCaracteristic->setEstate($estate);

                $manager->persist($estateCaracteristic);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CaracteristicFixtures::class,
            EstateFixtures::class,
        ];
    }
}
