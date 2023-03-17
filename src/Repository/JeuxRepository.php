<?php

namespace App\Repository;

use App\Controller\DefaultController;
use App\Entity\Jeux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class JeuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jeux::class);
    }

    public function save(Jeux $entity, bool $flush = true): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Jeux $entity, bool $flush = true): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findLastJeux(int $max = 12)
    {
        return $this->createQueryBuilder('j')
            ->orderBy('j.id', 'DESC')
            ->setMaxResults($max)
            ->getQuery()
            ->getResult();
    }
}
