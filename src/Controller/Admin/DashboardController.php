<?php

namespace App\Controller\Admin;

use App\Entity\Tags;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Users;
use App\Entity\Shows;
use App\Entity\Locations;
use App\Entity\Prices;
use App\Entity\Localities;
use App\Entity\Representations;
use App\Entity\RepresentationReservation;
use App\Entity\Artists;
use App\Entity\Types;
use App\Entity\ArtisteType;
use App\Entity\ArtisteTypeShow;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

    $url = $adminUrlGenerator
        ->setController(ShowsCrudController::class)
        ->generateUrl();

    return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Int Gration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', Users::class);
        yield MenuItem::linkToCrud('Shows', 'fas fa-user', Shows::class);
        yield MenuItem::linkToCrud('Locations', 'fas fa-user', Locations::class);
        yield MenuItem::linkToCrud('Prix', 'fas fa-user', Prices::class);
        yield MenuItem::linkToCrud('Localité', 'fas fa-user', Localities::class);
        yield MenuItem::linkToCrud('Représentations', 'fas fa-user', Representations::class);
        yield MenuItem::linkToCrud('Représentations - Réservatiion', 'fas fa-user', RepresentationReservation::class);
        yield MenuItem::linkToCrud('Artists', 'fas fa-user', Artists::class);
        yield MenuItem::linkToCrud('Types', 'fas fa-user', Types::class);
        yield MenuItem::linkToCrud('Artiste_Type', 'fas fa-user', ArtisteType::class);
        yield MenuItem::linkToCrud('Artiste_Type_Show', 'fas fa-user', ArtisteTypeShow::class);
        yield MenuItem::linkToCrud('Tags', 'fas fa-user', Tags::class);
    }
}
