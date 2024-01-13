<?php

namespace App\Repository;

use App\Entity\Pagination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pagination>
 *
 * @method Pagination|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pagination|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pagination[]    findAll()
 * @method Pagination[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaginationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pagination::class);
    }

//    /**
//     * @return Pagination[] Returns an array of Pagination objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    public function findOneByControllerName($value): ?Pagination
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.controllerName = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
