<?php

namespace UserBundle\Entity;

/**
 * Investor
 */
class Investor
{
    /**
     * @var int
     */
    private $id;


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
     * @var string
     */
    private $statusInvestor;

    /**
     * @var \UserBundle\Entity\User
     */
    private $user;


    /**
     * Set statusInvestor
     *
     * @param string $statusInvestor
     *
     * @return Investor
     */
    public function setStatusInvestor($statusInvestor)
    {
        $this->statusInvestor = $statusInvestor;

        return $this;
    }

    /**
     * Get statusInvestor
     *
     * @return string
     */
    public function getStatusInvestor()
    {
        return $this->statusInvestor;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Investor
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
}
