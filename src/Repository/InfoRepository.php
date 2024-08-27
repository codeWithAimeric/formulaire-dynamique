<?php

namespace App\Repository;

use App\Entity\Info;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @extends ServiceEntityRepository<Info>
 */
class InfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private PaginatorInterface $paginator)
    {
        parent::__construct($registry, Info::class);
    }

    public function findAllGroupedByFormId(Request $request, int $limit = 10)
    {
        $queryBuilder = $this->createQueryBuilder('i')
        ->select('i')
        ->orderBy('i.formId', 'ASC')
        ->addOrderBy('i.fieldLabel', 'ASC');

        return $this->paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1), // Numéro de la page courante
            $limit // Limite par page
        );
    }

    //    /**
    //     * @return Info[] Returns an array of Info objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Info
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
