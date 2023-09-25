<?php

namespace App\Repository;

use App\Entity\Folio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Folio>
 *
 * @method Folio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Folio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Folio[]    findAll()
 * @method Folio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FolioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Folio::class);
    }

    public function selectedByPage(int $page, int $limit): array
    {
        if ($page <= 0) {
            $page = 1;
        }
        if ($limit != null)
            $limit = abs($limit);

        $query = $this->createQueryBuilder('folio') // folio est juste un alias
        ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery();

        return $query->getResult();
    }


    public function paginationQuery()
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.id', 'ASC')
            ->getQuery();
    }

//    public function findOneBySomeField($value): ?Folio
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
