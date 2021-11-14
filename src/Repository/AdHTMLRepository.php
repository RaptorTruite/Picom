<?php

namespace App\Repository;

use App\Entity\AdHTML;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdHTML|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdHTML|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdHTML[]    findAll()
 * @method AdHTML[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdHTMLRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdHTML::class);
    }

    // /**
    //  * @return AdHTML[] Returns an array of AdHTML objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdHTML
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
