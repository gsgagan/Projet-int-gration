<?php

namespace App\Controller\Admin;

use App\Entity\Representations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class RepresentationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Representations::class;
    }

    
     public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('showshowId', 'Spectacles')
                ->setFormTypeOptions([
                    'class' => 'App\Entity\Shows',
                    'choice_label' => 'title',
                    'query_builder' => function ($er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.title', 'ASC');
                    },
                ]),
            DateField::new('schedule', 'Date')
                ->setFormat('dd/MM/yyyy')
                ->setHelp('Entrez une date'),
            AssociationField::new('locationId', 'Lieux')
                ->setFormTypeOptions([
                    'class' => 'App\Entity\Locations',
                    'choice_label' => 'designation',
                    'query_builder' => function ($er) {
                        return $er->createQueryBuilder('l')
                            ->orderBy('l.designation', 'ASC');
                    },
                ]),
        ];
    }
    
}
