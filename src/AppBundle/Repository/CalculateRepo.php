<?php
/**
 * Created by PhpStorm.
 * User: mariusz
 * Date: 25.03.17
 * Time: 09:43
 */

namespace AppBundle\Repository;

use AppBundle\Entity\CalculateResult;
use Doctrine\ORM\EntityManager;

class CalculateRepo extends EntityManager implements CalculateRepoInterface {

    /**
     * @param CalculateResult $calculateResult
     * @return CalculateResult
     */
    public function save(CalculateResult $calculateResult)
    {
       $this->persist($calculateResult);
       $this->flush();
    }

    /**
     * @param $id
     * @return CalculateResult
     */
    public function findById($id)
    {
       return $this->findById($id);
    }
}