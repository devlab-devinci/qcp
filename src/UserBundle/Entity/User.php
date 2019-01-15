<?php

namespace UserBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;

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
     * @var \UserBundle\Entity\Tenant
     */
    private $tenant;


    /**
     * Set tenant
     *
     * @param \UserBundle\Entity\Tenant $tenant
     *
     * @return User
     */
    public function setTenant(\UserBundle\Entity\Tenant $tenant = null)
    {
        $this->tenant = $tenant;

        return $this;
    }

    /**
     * Get tenant
     *
     * @return \UserBundle\Entity\Tenant
     */
    public function getTenant()
    {
        return $this->tenant;
    }
    /**
     * @var \UserBundle\Entity\Investor
     */
    private $investor;


    /**
     * Set investor
     *
     * @param \UserBundle\Entity\Investor $investor
     *
     * @return User
     */
    public function setInvestor(\UserBundle\Entity\Investor $investor = null)
    {
        $this->investor = $investor;

        return $this;
    }

    /**
     * Get investor
     *
     * @return \UserBundle\Entity\Investor
     */
    public function getInvestor()
    {
        return $this->investor;
    }
    /**
     * @var \ProjetBundle\Entity\Projet
     */
    private $projet;


    /**
     * Set projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     *
     * @return User
     */
    public function setProjet(\ProjetBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \ProjetBundle\Entity\Projet
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Add projet
     *
     * @param \ProjetBundle\Entity\Projet $projet
     *
     * @return User
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
}
