<?php

namespace ProjetBundle\Entity;

/**
 * Projet
 */
class Projet
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tenant;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tenant = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Projet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add tenant
     *
     * @param \UserBundle\Entity\Tenant $tenant
     *
     * @return Projet
     */
    public function addTenant(\UserBundle\Entity\Tenant $tenant)
    {
        $this->tenant[] = $tenant;

        return $this;
    }

    /**
     * Remove tenant
     *
     * @param \UserBundle\Entity\Tenant $tenant
     */
    public function removeTenant(\UserBundle\Entity\Tenant $tenant)
    {
        $this->tenant->removeElement($tenant);
    }

    /**
     * Get tenant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTenant()
    {
        return $this->tenant;
    }

    function __toString()
    {
     return (string)$this->name;
    }
}
