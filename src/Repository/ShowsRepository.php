<?php

namespace App\Repository;

use App\Entity\Shows;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Shows>
 */
class ShowsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shows::class);
    }

    public function findShowsWithPrices(): array
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.schedule', 'r') // Joindre les représentations
            ->leftJoin('r.representationReservations', 'rr') // Joindre les réservations de représentations
            ->leftJoin('rr.priceId', 'p') // Joindre les prix
            ->addSelect('r', 'rr', 'p') // Sélectionner ces entités pour éviter les requêtes N+1
            ->getQuery()
            ->getResult();
    }

    public function findShowWithPricesBySlug(string $slug): ?object
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.schedule', 'r') // Joindre les représentations
            ->leftJoin('r.representationReservations', 'rr') // Joindre les réservations de représentations
            ->leftJoin('rr.priceId', 'p') // Joindre les prix
            ->addSelect('r', 'rr', 'p') // Sélectionner ces entités pour éviter les requêtes N+1
            ->where('s.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult(); // Retourne un seul résultat ou null si non trouvé
    }
    

 public function findShowWithDetailsBySlug(string $slug): ?object
{
    return $this->createQueryBuilder('s')
        ->leftJoin('s.schedule', 'r')
        ->leftJoin('r.representationReservations', 'rr')
        ->leftJoin('rr.priceId', 'p')
        ->leftJoin('s.artisteTypeShows', 'ats')
        ->leftJoin('ats.artisteTypeId', 'at')
        ->leftJoin('at.artistId', 'a')
        ->leftJoin('at.typeId', 't')
        ->leftJoin('s.locationId', 'l')
        ->addSelect('r', 'rr', 'p', 'ats', 'at', 'a', 't', 'l')
        ->where('s.slug = :slug')
        ->setParameter('slug', $slug)
        ->getQuery()
        ->getOneOrNullResult();
}

    //    /**
    //     * @return Shows[] Returns an array of Shows objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Shows
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
