<?php

namespace App\DataFixtures;

use App\Entity\Locality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LocalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $localities = ['Brussels', 'Antwerp', 'Ghent', 'Charleroi', 'Liège'];

        foreach ($localities as $name) {
            $locality = new Locality();
            $locality->setName($name);
            $manager->persist($locality);
        }

        $manager->flush();
    }
}
