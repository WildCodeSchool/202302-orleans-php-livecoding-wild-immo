<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('admin@wildimmo.com');
        $admin->setFirstName('Bilbo');
        $admin->setLastName('Baggins');
        $admin->setPassword($this->userPasswordHasher->hashPassword($admin, 'azerty'));
        $manager->persist($admin);
        $manager->flush();
    }
}
