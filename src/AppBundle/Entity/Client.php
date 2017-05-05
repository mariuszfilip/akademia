<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: mariusz
 * Date: 21.04.17
 * Time: 14:36
 */


namespace AppBundle\Entity;


/**
 * Class Client
 * @package AppBundle\Entity
 */
=======
 * User: pkociszewski
 * Date: 22.04.17
 * Time: 09:20
 */
namespace AppBundle\Entity;

>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Client
<<<<<<< HEAD
 * @ORM\Entity
=======
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProposalRepo")
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
 * @ORM\Table(name="client")
 */
class Client{

<<<<<<< HEAD

    /**
=======
    /**
     * @var string
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $client_id;
    /**
     * @ORM\Column(type="string")
     */
<<<<<<< HEAD
    private $name;
    /**
     * @ORM\Column(type="string")
     */
    private $surname;
    /**
     * @ORM\Column(type="string")
     */
    private $pesel;
=======
    private $pesel;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @ORM\Column(type="string")
     */
    private $surname;
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
=======
    public function getPesel()
    {
        return $this->pesel;
    }

    /**
     * @param mixed $pesel
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
=======
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function getPesel()
    {
        return $this->pesel;
    }

    /**
     * @param mixed $pesel
     */
    public function setPesel($pesel)
    {
        $this->pesel = $pesel;
=======
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
    }




<<<<<<< HEAD


=======
>>>>>>> ce2a5d6e2921d5a033a76d0f088a885435c6a6de
}