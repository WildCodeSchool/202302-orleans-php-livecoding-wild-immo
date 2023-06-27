<?php

namespace App\Repository;

use App\Entity\Estate;
use App\Entity\EstateSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Estate>
 *
 * @method Estate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Estate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Estate[]    findAll()
 * @method Estate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Estate::class);
    }

    public function save(Estate $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Estate $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function searchEstate(EstateSearch $estateSearch): array
    {
        $queryBuilder = $this->createQueryBuilder('e');
        if ($estateSearch->getSearch()) {
            $queryBuilder->andWhere('e.title LIKE :search')
                ->setParameter('search', '%' . $estateSearch->getSearch() . '%');
        }
        if ($estateSearch->getMinPrice()) {
            $queryBuilder->andWhere('e.price > :minPrice')
                ->setParameter('minPrice', $estateSearch->getMinPrice());
        }
        if ($estateSearch->getMaxPrice()) {
            $queryBuilder->andWhere('e.price < :maxPrice')
                ->setParameter('maxPrice', $estateSearch->getMaxPrice());
        }
        if ($estateSearch->getEstateCategory()) {
            $queryBuilder->andWhere('e.estateCategory = :estateCategory')
            ->setParameter('estateCategory', $estateSearch->getEstateCategory());
        }

        return $queryBuilder->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Estate[] Returns an array of Estate objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Estate
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
