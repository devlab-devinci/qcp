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
    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $firstname;


    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Investor
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
     * @return Investor
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
     * @var \DateTime
     */
    private $birthday;


    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return Investor
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
}
