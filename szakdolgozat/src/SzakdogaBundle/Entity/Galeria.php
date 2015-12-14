<?php

namespace SzakdogaBundle\Entity;

/**
 * Galeria
 */
class Galeria
{
    /**
     * @var integer
     */
    private $szallasId;

    /**
     * @var string
     */
    private $kepnev;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set szallasId
     *
     * @param integer $szallasId
     *
     * @return Galeria
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
     * Set kepnev
     *
     * @param string $kepnev
     *
     * @return Galeria
     */
    public function setKepnev($kepnev)
    {
        $this->kepnev = $kepnev;

        return $this;
    }

    /**
     * Get kepnev
     *
     * @return string
     */
    public function getKepnev()
    {
        return $this->kepnev;
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
