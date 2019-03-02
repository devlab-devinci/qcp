<?php

namespace UserBundle\Entity;

/**
 * Tenant
 */
class Tenant
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $statusTenant;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set statusTenant
     *
     * @param string $statusTenant
     *
     * @return Tenant
     */
    public function setStatusTenant($statusTenant)
    {
        $this->statusTenant = $statusTenant;

        return $this;
    }

    /**
     * Get statusTenant
     *
     * @return string
     */
    public function getStatusTenant()
    {
        return $this->statusTenant;
    }
    /**
     * @var \UserBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Tenant
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $projet;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     *
     * @return Tenant
     */
    public function addProjet(\ProjetBundle\Entity\Projet $projet)
    {
        $this->projet[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     */
    public function removeProjet(\ProjetBundle\Entity\Projet $projet)
    {
        $this->projet->removeElement($projet);
    }

    /**
     * Get projet
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjet()
    {
        return $this->projet;
    }

    public function getName(\UserBundle\Entity\User $user){
        return (string)$user->getUsername();
    }

    public function __toString() {
        return $this->user->getUsername();
    }

    /**
     * Set projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     *
     * @return Tenant
     */
    public function setProjet(\ProjetBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }


    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var \DateTime
     */
    private $birthday;

    /**
     * @var string
     */
    private $relation;

    /**
     * @var string
     */
    private $worktype;

    /**
     * @var string
     */
    private $child;

    /**
     * @var string
     */
    private $bail;

    /**
     * @var string
     */
    private $rent;

    /**
     * @var string
     */
    private $qsp;

    /**
     * @var string
     */
    private $docPI;

    /**
     * @var string
     */
    private $docReleveUn;

    /**
     * @var string
     */
    private $docReleveDeux;

    /**
     * @var string
     */
    private $docReleveTrois;

    /**
     * @var string
     */
    private $docJustifie;

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Tenant
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Tenant
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return Tenant
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set relation
     *
     * @param string $relation
     *
     * @return Tenant
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Get relation
     *
     * @return string
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * Set worktype
     *
     * @param string $worktype
     *
     * @return Tenant
     */
    public function setWorktype($worktype)
    {
        $this->worktype = $worktype;

        return $this;
    }

    /**
     * Get worktype
     *
     * @return string
     */
    public function getWorktype()
    {
        return $this->worktype;
    }

    /**
     * Set child
     *
     * @param string $child
     *
     * @return Tenant
     */
    public function setChild($child)
    {
        $this->child = $child;

        return $this;
    }

    /**
     * Get child
     *
     * @return string
     */
    public function getChild()
    {
        return $this->child;
    }

    /**
     * Set bail
     *
     * @param string $bail
     *
     * @return Tenant
     */
    public function setBail($bail)
    {
        $this->bail = $bail;

        return $this;
    }

    /**
     * Get bail
     *
     * @return string
     */
    public function getBail()
    {
        return $this->bail;
    }

    /**
     * Set rent
     *
     * @param string $rent
     *
     * @return Tenant
     */
    public function setRent($rent)
    {
        $this->rent = $rent;

        return $this;
    }

    /**
     * Get rent
     *
     * @return string
     */
    public function getRent()
    {
        return $this->rent;
    }

    /**
     * Set qsp
     *
     * @param string $qsp
     *
     * @return Tenant
     */
    public function setQsp($qsp)
    {
        $this->qsp = $qsp;

        return $this;
    }

    /**
     * Get qsp
     *
     * @return string
     */
    public function getQsp()
    {
        return $this->qsp;
    }
    /**
     * @var string
     */
    private $status;


    /**
     * Set status
     *
     * @param string $status
     *
     * @return Tenant
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDocPI()
    {
        return $this->docPI;
    }

    /**
     * @param string $docPI
     */
    public function setDocPI($docPI)
    {
        $this->docPI = $docPI;
    }

    /**
     * @return string
     */
    public function getDocReleveUn()
    {
        return $this->docReleveUn;
    }

    /**
     * @param string $docReleveUn
     */
    public function setDocReleveUn($docReleveUn)
    {
        $this->docReleveUn = $docReleveUn;
    }

    /**
     * @return string
     */
    public function getDocReleveDeux()
    {
        return $this->docReleveDeux;
    }

    /**
     * @param string $docReleveDeux
     */
    public function setDocReleveDeux($docReleveDeux)
    {
        $this->docReleveDeux = $docReleveDeux;
    }

    /**
     * @return string
     */
    public function getDocReleveTrois()
    {
        return $this->docReleveTrois;
    }

    /**
     * @param string $docReleveTrois
     */
    public function setDocReleveTrois($docReleveTrois)
    {
        $this->docReleveTrois = $docReleveTrois;
    }

    /**
     * @return string
     */
    public function getDocJustifie()
    {
        return $this->docJustifie;
    }

    /**
     * @param string $docJustifie
     */
    public function setDocJustifie($docJustifie)
    {
        $this->docJustifie = $docJustifie;
    }
}
