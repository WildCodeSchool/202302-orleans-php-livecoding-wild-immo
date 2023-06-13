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
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $manager->flush();

        $user = new User();
        $user->setEmail('user@wildimmo.com');
        $user->setFirstName('Frodo');
        $user->setLastName('Baggins');
        $user->setPassword($this->userPasswordHasher->hashPassword($user, 'sauron'));
        $manager->persist($user);
        $manager->flush();
    }
}
