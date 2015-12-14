<?php

namespace SzakdogaBundle\Entity;

/**
 * Users
 */
class Users
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var integer
     */
    private $salt;

    /**
     * @var integer
     */
    private $jog;

    /**
     * @var string
     */
    private $nev;

    /**
     * @var \DateTime
     */
    private $utolsobelep;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return Users
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set salt
     *
     * @param integer $salt
     *
     * @return Users
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
        return $this;
    }

    /**
     * Get salt
     *
     * @return integer
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set jog
     *
     * @param integer $jog
     *
     * @return Users
     */
    public function setJog($jog)
    {
        $this->jog = $jog;
        return $this;
    }

    /**
     * Get jog
     *
     * @return integer
     */
    public function getJog()
    {
        return $this->jog;
    }

    /**
     * Set nev
     *
     * @param string $nev
     *
     * @return Users
     */
    public function setNev($nev)
    {
        $this->nev = $nev;
        return $this;
    }

    /**
     * Get nev
     *
     * @return string
     */
    public function getNev()
    {
        return $this->nev;
    }

    /**
     * Set utolsobelep
     *
     * @param \DateTime $utolsobelep
     *
     * @return Users
     */
    public function setUtolsobelep()
    {
        $this->utolsobelep = new \DateTime();
        return $this;
    }

    /**
     * Get utolsobelep
     *
     * @return \DateTime
     */
    public function getUtolsobelep()
    {
        return $this->utolsobelep;
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
}
