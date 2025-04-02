<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\Shows;
use App\Entity\Locations;
use App\Entity\Types;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;
    private $slugger;

    public function __construct(UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger)
    {
        $this->passwordHasher = $passwordHasher;
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        // 🔹 Création d'un utilisateur de test
        $user = new Users();
        $user->setLogin("admin");
        $user->setEmail("admin@test.com");
        $user->setFirstname("Admin");
        $user->setLastname("User");
        $user->setLangue("FR");
        $user->setPassword($this->passwordHasher->hashPassword($user, "password123"));
        $manager->persist($user);

        // 🔹 Ajout de spectacles de test
        for ($i = 1; $i <= 5; $i++) {
            $show = new Shows();
            $title = "Spectacle " . $i;
            $show->setTitle($title);
            $show->setSlug($this->slugger->slug($title)->lower());
            $show->setDuration(120);
            $show->setCreatedIn((int)date('Y'));
            $show->setBookable(true);
            $manager->persist($show);
        }

        // 🔹 Ajout de locations avec un slug correct
        for ($i = 1; $i <= 3; $i++) {
            $location = new Locations();
            $designation = "Lieu " . $i;
            $location->setDesignation($designation);
            $location->setSlug($this->slugger->slug($designation)->lower());
            $location->setAddress("Adresse $i");
            $location->setWebsite("http://site$i.com");
            $location->setPhone("012345678$i");
            $manager->persist($location);
        }

        // 🔹 Ajout de types avec des slugs
        $typeNames = ["Acteur", "Chanteur", "Danseur", "Musicien"];
        foreach ($typeNames as $typeName) {
            $type = new Types();
            $type->setType($typeName);
            $type->setSlug($this->slugger->slug($typeName)->lower());
            $manager->persist($type);
        }

        // 🔹 Sauvegarde en base
        $manager->flush();
    }
}