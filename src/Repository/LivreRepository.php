<?php

namespace App\Repository;

use App\Entity\Livre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Livre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Livre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Livre[]    findAll()
 * @method Livre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livre::class);
    }


    public function findByMot($mot)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.titre LIKE :mot')
            ->setParameter('mot',   $mot . '%')
            ->getQuery()
            ->execute();
    }

    public function findByRated()
    {
        return $this->createQueryBuilder('l')
            ->orderBy('l.rank', 'Desc')
            ->getQuery()
            ->execute();
    }

    public function findByNew()
    {
        return $this->createQueryBuilder('l')
            ->orderBy('l.date', 'Desc')
            ->getQuery()
            ->execute();
    }


    public function findPromo()
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.promo >0')
            ->orderBy('l.promo', 'Desc')
            ->getQuery()
            ->execute();
    }

    // /**
    //  * @return Livre[] Returns an array of Livre objects
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
    public function findOneBySomeField($value): ?Livre
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
