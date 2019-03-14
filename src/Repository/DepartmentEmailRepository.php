<?php

namespace App\Repository;

use App\Entity\DepartmentEmail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DepartmentEmail|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepartmentEmail|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepartmentEmail[]    findAll()
 * @method DepartmentEmail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepartmentEmailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DepartmentEmail::class);
    }

    // /**
    //  * @return DepartmentEmail[] Returns an array of DepartmentEmail objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepartmentEmail
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
