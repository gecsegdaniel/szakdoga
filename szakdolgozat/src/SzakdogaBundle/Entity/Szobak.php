<?php

namespace SzakdogaBundle\Entity;

/**
 * Szobak
 */
class Szobak
{
    /**
     * @var integer
     */
    private $szallasId;

    /**
     * @var string
     */
    private $szobaszam;

    /**
     * @var integer
     */
    private $fo;

    /**
     * @var integer
     */
    private $ar;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $legter;

    /**
     * @var integer
     */
    private $agyak;


    /**
     * Set szallasId
     *
     * @param integer $szallasId
     *
     * @return Szobak
     */
    public function setSzallasId($szallasId)
    {
        $this->szallasId = $szallasId;

        return $this;
    }

    /**
     * Get szallasId
     *
     * @return integer
     */
    public function getSzallasId()
    {
        return $this->szallasId;
    }

    /**
     * Set szobaszam
     *
     * @param string $szobaszam
     *
     * @return Szobak
     */
    public function setSzobaszam($szobaszam)
    {
        $this->szobaszam = $szobaszam;

        return $this;
    }

    /**
     * Get szobaszam
     *
     * @return string
     */
    public function getSzobaszam()
    {
        return $this->szobaszam;
    }

    /**
     * Set fo
     *
     * @param integer $fo
     *
     * @return Szobak
     */
    public function setFo($fo)
    {
        $this->fo = $fo;

        return $this;
    }

    /**
     * Get fo
     *
     * @return integer
     */
    public function getFo()
    {
        return $this->fo;
    }

    /**
     * Set ar
     *
     * @param integer $ar
     *
     * @return Szobak
     */
    public function setAr($ar)
    {
        $this->ar = $ar;

        return $this;
    }

    /**
     * Get ar
     *
     * @return integer
     */
    public function getAr()
    {
        return $this->ar;
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
     * Set legter
     *
     * @param integer $legter
     *
     * @return Szobak
     */
    public function setLegter($legter)
    {
        $this->legter = $legter;

        return $this;
    }

    /**
     * Get legter
     *
     * @return integer
     */
    public function getLegter()
    {
        return $this->legter;
    }

    /**
     * Set agyak
     *
     * @param integer $agyak
     *
     * @return Szobak
     */
    public function setAgyak($agyak)
    {
        $this->agyak = $agyak;

        return $this;
    }

    /**
     * Get agyak
     *
     * @return integer
     */
    public function getAgyak()
    {
        return $this->agyak;
    }
}
