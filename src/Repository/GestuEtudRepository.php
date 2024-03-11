<?php

namespace App\Repository;

use App\Entity\GestuEtud;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GestuEtud>
 *
 * @method GestuEtud|null find($id, $lockMode = null, $lockVersion = null)
 * @method GestuEtud|null findOneBy(array $criteria, array $orderBy = null)
 * @method GestuEtud[]    findAll()
 * @method GestuEtud[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GestuEtudRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GestuEtud::class);
    }

//    /**
//     * @return GestuEtud[] Returns an array of GestuEtud objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GestuEtud
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
