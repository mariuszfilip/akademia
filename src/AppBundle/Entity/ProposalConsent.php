<?php
/**
 * Created by PhpStorm.
 * User: maciej
 * Date: 10.03.17
 * Time: 18:42
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="proposals_consents")
 * */
class ProposalConsent
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @var Proposal
     * @ORM\ManyToOne(targetEntity="Proposal")
     * @ORM\JoinColumn(name="proposal_id", referencedColumnName="id")
     */
    private $proposal;
    /**
     * @var Consent
     * @ORM\ManyToOne(targetEntity="Consent")
     * @ORM\JoinColumn(name="consent_id", referencedColumnName="id")
     */
    private $consent;
    /**
     * @var bool
     * @ORM\Column(name="is_checked", type="boolean")
     */
    private $is_checked;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Proposal
     */
    public function getProposal()
    {
        return $this->proposal;
    }

    /**
     * @param Proposal $proposal
     */
    public function setProposal(Proposal $proposal)
    {
        $this->proposal = $proposal;
    }

    /**
     * @return Consent
     */
    public function getConsent()
    {
        return $this->consent;
    }

    /**
     * @param int $consent
     */
    public function setConsent($consent)
    {
        $this->consent = $consent;
    }

    /**
     * @return bool
     */
    public function isIsChecked()
    {
        return $this->is_checked;
    }

    /**
     * @param bool $is_checked
     */
    public function setIsChecked($is_checked)
    {
        $this->is_checked = $is_checked;
    }

}