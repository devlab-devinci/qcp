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


}
