<?php

namespace App\Controller\Admin;

use App\Entity\ArtisteTypeShow;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ArtisteTypeShowCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArtisteTypeShow::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('artisteTypeId', 'Artiste_Type')
                ->setFormTypeOption('by_reference', false),
            AssociationField::new('showId', 'Show')
                ->setFormTypeOption('by_reference', false),
        ];
    }
    
}
