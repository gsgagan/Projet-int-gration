<?php

namespace App\Controller\Admin;

use App\Entity\RepresentationReservation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class RepresentationReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RepresentationReservation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('representationId', 'Représentation')
                ->setFormTypeOption('by_reference', false),
            AssociationField::new('reservationId', 'Réservation')
                ->setFormTypeOption('by_reference', false)
                ->setRequired(false),
            AssociationField::new('priceId', 'Prix')
                ->setFormTypeOption('by_reference', false),
            IntegerField::new('quantity')->setLabel('Quantité'),
        ];
    }
    
}
