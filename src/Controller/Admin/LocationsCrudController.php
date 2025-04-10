<?php

namespace App\Controller\Admin;

use App\Entity\Locations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class LocationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Locations::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            SlugField::new('slug')->setTargetFieldName('designation'),
            TextField::new('designation')->setLabel('Designation'),
            TextField::new('address')->setLabel('Adresse'),
            TextField::new('website')->setLabel('Site web'),
            TextField::new('phone')->setLabel('Numéro de téléphone'),
            AssociationField::new('shows', 'Spectacles')
                ->setFormTypeOption('by_reference', false),
        ];
    }
    
}
