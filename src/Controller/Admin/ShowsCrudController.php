<?php

namespace App\Controller\Admin;

use App\Entity\Shows;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class ShowsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Shows::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
             SlugField::new('slug')->setTargetFieldName('title'),
             TextField::new('title')->setLabel('Titre')->setHelp('Titre du spectacle'),
             ImageField::new('poster_url')->setLabel('Photo')->setHelp('Photo du spectacle')->setUploadDir('/public/uploads')->setBasePath('/uploads')->setUploadedFileNamePattern('[year]-[month]-[day]-[contenthash].[extension]'),
             IntegerField::new('duration')->setLabel('Durée')->setHelp('En miutes'),
             IntegerField::new('created_in')->setLabel('Date de création')->setHelp("Uniquement l'année"),
             BooleanField::new('bookable')->setLabel('Réservé')
   
        ];
    }
    
}
