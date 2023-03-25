<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const ADMIN_USER_REFERENCE = 'admin-user';

    public function load(ObjectManager $manager): void
    {
        $userAdmin = new User();
        $userAdmin->setEmail('john@example.com');
        $userAdmin->setPassword('secret123');
        $manager->persist($userAdmin);
        $manager->flush();

        // other fixtures can get this object using the UserFixtures::ADMIN_USER_REFERENCE constant
        $this->addReference('admin-user', $userAdmin);

    }
}
