<?php

namespace App\Command;

use App\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:load-tags',
    description: 'Charge les tags prédéfinis dans la base de données',
)]
class LoadTagsCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $tagNames = ['Promotion', 'Nouveau', 'Populaire', 'Bio', 'Local', 'Végétarien', 'Sans gluten'];

        $created = 0;
        foreach ($tagNames as $name) {
            // Vérifier si le tag existe déjà
            $existingTag = $this->entityManager->getRepository(Tag::class)->findOneBy(['tag' => $name]);

            if (!$existingTag) {
                $tag = new Tag();
                $tag->setTag($name); // Utilisez setTag() au lieu de setName()
                $this->entityManager->persist($tag);
                $created++;
            }
        }

        $this->entityManager->flush();

        $io->success(sprintf('%d tags ont été créés.', $created));

        return Command::SUCCESS;
    }
}