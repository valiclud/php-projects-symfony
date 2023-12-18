<?php

namespace App\Repository;

use App\Entity\OriginalText;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 *  The originalText repository
 */
class OriginalTextRepository extends ServiceEntityRepository
{
    /**
     * The constructor.
     * @param \Doctrine\Persistence\ManagerRegistry $registry the registry manager.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OriginalText::class);
    }

}
