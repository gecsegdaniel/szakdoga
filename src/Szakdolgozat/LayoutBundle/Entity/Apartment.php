<?php

namespace Szakdolgozat\LayoutBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="apartments")
 */
class Apartment
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
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $city;

    /**
     * @ORM\Column(type="string")
     */
    private $address;

    /**
     * @ORM\Column(type="string")
     */
    private $webpage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $climate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $tv;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wifi;

    /**
     * @ORM\Column(type="boolean")
     */
    private $restaurant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $parking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $specialparking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $highlighted;

    /**
     * @ORM\OneToMany(targetEntity="Room", mappedBy="apartment")
     */
    private $rooms;


    public function __construct()
    {
        $this->climate = false;
        $this->tv = false;
        $this->wifi = false;
        $this->restaurant = false;
        $this->parking = false;
        $this->specialparking = false;
        $this->highlighted = false;
        $this->rooms = new ArrayCollection();
    }

    /**
     * @return string
     */
    function __toString()
    {
        return (string)$this->getName();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getWebpage()
    {
        return $this->webpage;
    }

    /**
     * @return boolean
     */
    public function isClimate()
    {
        return $this->climate;
    }

    /**
     * @return boolean
     */
    public function isTv()
    {
        return $this->tv;
    }

    /**
     * @return boolean
     */
    public function isWifi()
    {
        return $this->wifi;
    }

    /**
     * @return boolean
     */
    public function isRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * @return boolean
     */
    public function isParking()
    {
        return $this->parking;
    }

    /**
     * @return boolean
     */
    public function isSpecialparking()
    {
        return $this->specialparking;
    }

    /**
     * @return mixed
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @return boolean
     */
    public function isHighlighted()
    {
        return $this->highlighted;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $webpage
     */
    public function setWebpage($webpage)
    {
        $this->webpage = $webpage;
    }

    /**
     * @param boolean $climate
     */
    public function setClimate($climate)
    {
        $this->climate = $climate;
    }

    /**
     * @param boolean $tv
     */
    public function setTv($tv)
    {
        $this->tv = $tv;
    }

    /**
     * @param boolean $wifi
     */
    public function setWifi($wifi)
    {
        $this->wifi = $wifi;
    }

    /**
     * @param boolean $restaurant
     */
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * @param boolean $parking
     */
    public function setParking($parking)
    {
        $this->parking = $parking;
    }

    /**
     * @param boolean $specialparking
     */
    public function setSpecialparking($specialparking)
    {
        $this->specialparking = $specialparking;
    }

    /**
     * @param boolean $highlighted
     */
    public function setHighlighted($highlighted)
    {
        $this->highlighted = $highlighted;
    }
}