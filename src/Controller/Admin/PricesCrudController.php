<?php

namespace App\Controller\Admin;

use App\Entity\Prices;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class PricesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prices::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type')->setLabel('Type'),
            IntegerField::new('price')->setLabel('Prix'),
            DateField::new('startDate', 'Date')
            ->setFormat('dd/MM/yyyy')
            ->setHelp('Date de début'),
            DateField::new('endDate', 'Date')
            ->setFormat('dd/MM/yyyy')
            ->setHelp('Date de fin'),
            
        ];
    }
    
}
