<?php

namespace App\Controller\Admin;

use App\Entity\Localities;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LocalitiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Localities::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('postalCode')->setLabel('Code postale'),
            TextField::new('locality')->setLabel('Localité'),
        ];
    }
    
}
