<?php

namespace App\DataFixtures;

use App\Entity\EstateCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EstateCategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        'Maison', 'Appartement', 'Parking'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $category) {
            $estateCategory = new EstateCategory();
            $estateCategory->setName($category);
            $manager->persist($estateCategory);
            $this->addReference('estate_category_' . $key, $estateCategory);
        }

        $manager->flush();
    }
}
