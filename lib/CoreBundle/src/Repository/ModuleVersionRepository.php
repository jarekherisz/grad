<?php

namespace Grad\CoreBundle\Repository;

use Grad\CoreBundle\Entity\ModuleVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModuleVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModuleVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModuleVersion[]    findAll()
 * @method ModuleVersion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModuleVersion::class);
    }

    // /**
    //  * @return ModuleVersion[] Returns an array of ModuleVersion objects
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


    public function findOneByName($value): ?ModuleVersion
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.name = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findOneByClass($value): ?ModuleVersion
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.class = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?ModuleVersion
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
