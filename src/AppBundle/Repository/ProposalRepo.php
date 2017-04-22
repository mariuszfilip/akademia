<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 25.03.17
 * Time: 09:43
 */

namespace AppBundle\Repository;

use AppBundle\Entity\CalculateResult;
use Doctrine\ORM\EntityRepository;

class ProposalRepo extends EntityRepository {

    public function findPropsal(){
        return $this->_em->find("AppBundle\Entity\Proposal",1);
    }

}