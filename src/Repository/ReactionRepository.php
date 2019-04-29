<?php

namespace App\Repository;

use App\Entity\Reaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ReactionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Reaction::class);
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

    
    public function findLastTen()
    {
        /*
        $fields = array('r.id','r.reaction','DATE_FORMAT(r.reaction, \'%Y\') as dateAsYear','IDENTITY(r.company) as c');

        return $this->createQueryBuilder('r')
            ->select($fields)
            
            //->orderBy('reaction.id', 'ASC')
            ->innerJoin('App\Entity\Rezume','rz',  \Doctrine\ORM\Query\Expr\Join::WITH, 'r.rezume = rz.id')
            ->getQuery()
            ->getResult()
        ;
        */

        $qb = $this->createQueryBuilder('r')
            ->join('r.company', 'c')
            ->join('r.rezume', 'z')
            ;
    
        return $qb->getQuery()->execute();        

    }  
    
    public function findAllReactionsById($id)
    {
        $qb = $this->createQueryBuilder('r')
            ->join('r.company', 'c')
            ->join('r.rezume', 'z')

            ; 
        return $qb->getQuery()->execute();           
    }

}
