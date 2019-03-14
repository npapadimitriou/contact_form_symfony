<?php

namespace App\Repository;

use App\Entity\Usercredentials;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Usercredentials|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usercredentials|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usercredentials[]    findAll()
 * @method Usercredentials[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsercredentialsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usercredentials::class);
    }

    // /**
    //  * @return Usercredentials[] Returns an array of Usercredentials objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usercredentials
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
