<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 25.03.17
 * Time: 09:43
 */

namespace AppBundle\Repository;

use AppBundle\Entity\CalculateResult;
<<<<<<< HEAD
use AppBundle\Entity\Proposal;
=======
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
use Doctrine\ORM\EntityRepository;

class ProposalRepo extends EntityRepository {

<<<<<<< HEAD


    /**
     * @param $id
     * @return Proposal
     */
    public function findById($id){
        return $this->_em->find('AppBundle\Entity\Proposal',$id);
=======
    public function findPropsal(){
        return $this->_em->find("AppBundle\Entity\Proposal",1);
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
    }

}