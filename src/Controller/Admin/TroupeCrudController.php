<?php

namespace App\Controller\Admin;

use App\Entity\Troupe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TroupeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Troupe::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('name')
                ->setLabel('Nom de la troupe')
                ->setHelp('Nom unique de la troupe (60 caractères maximum)')
                ->setRequired(true),

            TextField::new('logo_url')
                ->setLabel('URL du logo')
                ->setHelp('URL vers l\'image du logo de la troupe (255 caractères maximum)')
                ->setRequired(true),


            ImageField::new('logo_url')
                ->setLabel('Aperçu du logo')
                ->setBasePath('images/logos')

                ->onlyOnIndex()
                ->onlyOnDetail(),

            AssociationField::new('artists')
                ->setLabel('Artistes affiliés')
                ->onlyOnDetail() // Ne l'afficher que sur la page de détail
                ->setFormTypeOption('by_reference', false),
        ];
    }

}
