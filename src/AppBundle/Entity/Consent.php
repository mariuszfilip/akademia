<?php
/**
 * Created by PhpStorm.
 * User: maciej
 * Date: 10.03.17
 * Time: 18:40
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="consents")
 * */
class Consent
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255 )
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(name="field_name", type="string", length=255 )
     */
    private $field_name;
    /**
     * @var integer
     * @ORM\Column(name="status", type="integer")
     */
    private $status = 0;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFieldName()
    {
        return $this->field_name;
    }

    /**
     * @param string $field_name
     */
    public function setFieldName($field_name)
    {
        $this->field_name = $field_name;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}