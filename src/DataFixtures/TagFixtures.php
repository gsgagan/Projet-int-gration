<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Créez plusieurs tags pour tester
        $tagNames = ['Promotion', 'Nouveau', 'Populaire', 'Bio', 'Local', 'Végétarien', 'Sans gluten'];

        foreach ($tagNames as $index => $name) {
            $tag = new Tag();
            $tag->setName($name);
            // Si votre entité Tag a d'autres propriétés, définissez-les ici

            $manager->persist($tag);

            // Référence pour pouvoir utiliser ce tag dans d'autres fixtures
            $this->addReference('tag_' . $index, $tag);
        }

        $manager->flush();
    }

    // Ajoutez cette méthode
    public static function getGroups(): array
    {
        return ['tag_group'];
    }
}
