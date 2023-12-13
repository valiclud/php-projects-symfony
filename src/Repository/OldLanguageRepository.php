<?php

namespace App\Repository;

use App\Entity\OldLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OldLanguage>
 *
 * @method OldLanguage|null find($id, $lockMode = null, $lockVersion = null)
 * @method OldLanguage|null findOneBy(array $criteria, array $orderBy = null)
 * @method OldLanguage[]    findAll()
 * @method OldLanguage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OldLanguageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OldLanguage::class);
    }

//    /**
//     * @return OldLanguage[] Returns an array of OldLanguage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OldLanguage
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
