<?php

namespace App\Repository;

use App\Entity\Cartebancaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cartebancaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cartebancaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cartebancaire[]    findAll()
 * @method Cartebancaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartebancaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cartebancaire::class);
    }

    // /**
    //  * @return Cartebancaire[] Returns an array of Cartebancaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cartebancaire
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
