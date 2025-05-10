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
        $qb = $this->createQueryBuilder('s');

        return $qb
            ->select('s')
            ->addSelect('r')
            ->addSelect('rr')
            ->addSelect('p')
            ->leftJoin('s.schedule', 'r')
            ->leftJoin('r.representationReservations', 'rr')
            ->leftJoin('rr.priceId', 'p')
            ->getQuery()
            ->getResult();
    }

    public function findBySearch(string $searchTerm): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.title LIKE :search')
            ->orWhere('s.shortDesc LIKE :search')
            // Si vous avez d'autres champs à inclure dans la recherche, ajoutez-les ici
            ->setParameter('search', '%'.$searchTerm.'%')
            ->orderBy('s.title', 'ASC')
            ->getQuery()
            ->getResult();
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
