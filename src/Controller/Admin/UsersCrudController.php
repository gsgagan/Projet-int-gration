<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('login')->setLabel("Nom d'utilisateur"),
            TextField::new('password')->setLabel('mot de passe'),
            TextField::new('firstname')->setLabel('prénom'),
            TextField::new('lastname')->setLabel('nom'),
            TextField::new('email')->setLabel('e-mail'),
            TextField::new('langue')->setLabel('langue'),
        ];
    }
    
}
