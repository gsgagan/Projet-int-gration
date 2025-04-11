<?php

namespace App\Controller\Admin;

use App\Entity\ArtisteType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ArtisteTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArtisteType::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('artistId', 'Artiste')
                ->setFormTypeOption('by_reference', true),
            AssociationField::new('typeId', 'Type')
                ->setFormTypeOption('by_reference', true),
        ];
    }
    
}
