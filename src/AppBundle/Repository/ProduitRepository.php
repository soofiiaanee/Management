<?php

namespace AppBundle\Repository;

/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends \Doctrine\ORM\EntityRepository
{
    public function FindProduitsManques()
 {
     $queryBuilder=$this->createQueryBuilder('p');
     $queryBuilder->where('p.quantite <= 0');
     return $queryBuilder->getQuery()->getResult();
 }
}
