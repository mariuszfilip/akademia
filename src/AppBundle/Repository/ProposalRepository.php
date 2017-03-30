<?php
/**
 * Created by PhpStorm.
 * User: maciej
 * Date: 24.03.17
 * Time: 22:45
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Proposal p WHERE p.status = 1'
            )
            ->getResult();
    }
}