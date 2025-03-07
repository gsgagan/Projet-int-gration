<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $roles = ['Admin', 'User', 'Editor', 'Guest'];

        foreach ($roles as $title) {
            $role = new Role();
            $role->setTitle($title);
            $manager->persist($role);
        }

        $manager->flush();
    }
}
