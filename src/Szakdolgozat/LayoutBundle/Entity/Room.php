<?php

namespace Szakdolgozat\LayoutBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rooms")
 */
class Room
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
    */
    private $apartment_id;

    /**
     * @ORM\Column(type="string")
     */
    private $roomnumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $spot;

    /**
     * @ORM\Column(type="integer")
     */
    private $airspace;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberofbed;

    /**
     * @ORM\ManyToOne(targetEntity="Apartment", inversedBy="rooms")
     * @ORM\JoinColumn(name="apartment_id", referencedColumnName="id")
     */
    private $apartment;

    /**
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="room")
     */
    private $reservations;


    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    /**
     * @return string
     */
    function __toString()
    {
        return $this->getRoomnumber();
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
    public function getApartmentId()
    {
        return $this->apartment_id;
    }

    /**
     * @return mixed
     */
    public function getRoomnumber()
    {
        return $this->roomnumber;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getSpot()
    {
        return $this->spot;
    }

    /**
     * @return mixed
     */
    public function getAirspace()
    {
        return $this->airspace;
    }

    /**
     * @return mixed
     */
    public function getNumberofbed()
    {
        return $this->numberofbed;
    }

    /**
     * @return mixed
     */
    public function getApartment()
    {
        return $this->apartment;
    }

    /**
     * @param mixed $apartment_id
     */
    public function setApartmentId($apartment_id)
    {
        $this->apartment_id = $apartment_id;
    }

    /**
     * @param mixed $roomnumber
     */
    public function setRoomnumber($roomnumber)
    {
        $this->roomnumber = $roomnumber;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param mixed $spot
     */
    public function setSpot($spot)
    {
        $this->spot = $spot;
    }

    /**
     * @param mixed $airspace
     */
    public function setAirspace($airspace)
    {
        $this->airspace = $airspace;
    }

    /**
     * @param mixed $numberofbed
     */
    public function setNumberofbed($numberofbed)
    {
        $this->numberofbed = $numberofbed;
    }

    /**
     * @param mixed $apartment
     */
    public function setApartment($apartment)
    {
        $this->apartment = $apartment;
    }

    /**
     * @return mixed
     */
    public function getReservations()
    {
        return $this->reservations;
    }
}