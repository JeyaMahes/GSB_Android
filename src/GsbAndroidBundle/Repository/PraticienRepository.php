<?php

namespace GsbAndroidBundle\Repository;

/**
 * PraticienRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PraticienRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByPraVisiteurDQL($matricule){
        
        return $this->createQueryBuilder('m')
                    ->select("m.praNom , m.praPrenom ")
                    ->where("m.praVisiteur = ?1")
                    ->setParameter(1, $matricule)                  
                    ->getQuery()
                    ->getResult();        
    }
}
