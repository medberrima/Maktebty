<?php

namespace App\Repository;

use App\Entity\Lignepanier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lignepanier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lignepanier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lignepanier[]    findAll()
 * @method Lignepanier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignepanierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lignepanier::class);
    }

    // /**
    //  * @return Lignepanier[] Returns an array of Lignepanier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lignepanier
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
