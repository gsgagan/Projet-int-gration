<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $types = ['Music', 'Painting', 'Sculpture', 'Photography'];

        foreach ($types as $name) {
            $type = new Type();
            $type->setName($name);
            $manager->persist($type);
        }

        $manager->flush();
    }
}
