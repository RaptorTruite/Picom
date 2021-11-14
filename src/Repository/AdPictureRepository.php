<?php

namespace App\Repository;

use App\Entity\AdPicture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdPicture|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdPicture|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdPicture[]    findAll()
 * @method AdPicture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdPictureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdPicture::class);
    }

    // /**
    //  * @return AdPicture[] Returns an array of AdPicture objects
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
    public function findOneBySomeField($value): ?AdPicture
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
