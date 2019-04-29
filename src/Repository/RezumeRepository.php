<?php

namespace App\Repository;

use App\Entity\Rezume;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RezumeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Rezume::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('r')
            ->where('r.something = :value')->setParameter('value', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
  
    public function findActual()
    {
 
        $qb = $this->createQueryBuilder('r')
            ->select('r')
            ->leftJoin('App:Reaction', 'z', 'WITH', 'z.rezume = r.id')
            ;
    
        return $qb->getQuery()->execute();        

    }      
    
  
}
