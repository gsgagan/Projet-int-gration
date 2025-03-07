<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $artists = [
            ['firstname' => 'John', 'lastname' => 'Doe'],
            ['firstname' => 'Jane', 'lastname' => 'Smith'],
            ['firstname' => 'Michael', 'lastname' => 'Brown'],
            ['firstname' => 'Emily', 'lastname' => 'Davis'],
            ['firstname' => 'David', 'lastname' => 'Wilson'],
        ];

        foreach ($artists as $data) {
            $artist = new Artist();
            $artist->setFirstname($data['firstname']);
            $artist->setLastname($data['lastname']);

            $manager->persist($artist);
        }

        $manager->flush();
    }
}
