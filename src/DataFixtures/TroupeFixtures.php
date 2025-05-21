<?php

namespace App\DataFixtures;

use App\Entity\Troupe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class TroupeFixtures extends Fixture implements FixtureGroupInterface
{
    public const TROUPE_REFERENCE_PREFIX = 'troupe_';

    public function load(ObjectManager $manager): void
    {

        $troupesData = [
            [
                'name' => 'Les Étoiles Filantes',
                'logoUrl' => 'https://picsum.photos/id/237/200/200',
            ],
            [
                'name' => 'Cirque du Soleil',
                'logoUrl' => 'https://picsum.photos/id/238/200/200',
            ],
            [
                'name' => 'Théâtre Moderne',
                'logoUrl' => 'https://picsum.photos/id/239/200/200',
            ],
            [
                'name' => 'Ballet National',
                'logoUrl' => 'https://picsum.photos/id/240/200/200',
            ],
            [
                'name' => 'Opéra Royal',
                'logoUrl' => 'https://picsum.photos/id/241/200/200',
            ],
        ];

        // Création et persistance des entités Troupe
        foreach ($troupesData as $index => $troupeData) {
            $troupe = new Troupe();
            $troupe->setName($troupeData['name']);
            $troupe->setLogoUrl($troupeData['logoUrl']);

            $manager->persist($troupe);

            // Création d'une référence pour utilisation dans d'autres fixtures (par exemple pour Artists)
            $this->addReference(self::TROUPE_REFERENCE_PREFIX . $index, $troupe);
        }

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['troupe'];
    }
}