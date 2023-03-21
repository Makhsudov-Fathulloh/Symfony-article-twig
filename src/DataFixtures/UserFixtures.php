<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('john@example.com');
        $user->setPassword('secret123');
        $manager->persist($user);

        $user2 = new User();
        $user2->setEmail('nik@example.com');
        $user2->setPassword('secret123');
        $manager->persist($user2);

        $manager->flush();

        $this->addReference('user_1', $user);
        $this->addReference('user_2', $user2);
    }
}
