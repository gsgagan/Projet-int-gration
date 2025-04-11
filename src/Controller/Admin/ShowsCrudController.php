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
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

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
             TextField::new('shortDesc')->setLabel('Description courte'),
             TextareaField::new('description')
                ->setLabel('Description')
                ->setNumOfRows(4),
             ImageField::new('posterUrl')->setLabel('Photo')->setHelp('Photo du spectacle')->setUploadDir('/public/uploads')->setBasePath('/uploads')->setUploadedFileNamePattern('[year]-[month]-[day]-[contenthash].[extension]'),
             IntegerField::new('duration')->setLabel('Durée')->setHelp('En miutes'),
             IntegerField::new('createdIn')->setLabel('Date de création')->setHelp("Uniquement l'année"),
             AssociationField::new('locationId', 'Lieux')
            ->setFormTypeOptions([
                'class' => 'App\Entity\Locations',
                'choice_label' => 'designation',
            ]),
             BooleanField::new('bookable')->setLabel('Réservé')
   
        ];
    }
    
}
