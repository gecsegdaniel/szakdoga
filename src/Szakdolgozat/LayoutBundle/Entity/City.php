<?php

namespace Szakdolgozat\LayoutBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cities")
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="Apartment", mappedBy="city")
     */
    private $apartments;

    /**
     * City constructor.
     */
    public function __construct()
    {
        $this->apartments = new ArrayCollection();
    }


    /**
     * @return string
     */
    function __toString()
    {
        return $this->getCity();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getApartments()
    {
        return $this->apartments;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
}