<?php

namespace Szakdolgozat\LayoutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="reservations")
 */
class Reservation
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
    private $user_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $room_id;

    /**
     * @ORM\Column(type="date")
     */
    private $arrivaldate;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberofdays;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $specialrequest;

    /**
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="reservations")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    private $room;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->room_id;
    }

    /**
     * @param mixed $room_id
     */
    public function setRoomId($room_id)
    {
        $this->room_id = $room_id;
    }

    /**
     * @return mixed
     */
    public function getArrivaldate()
    {
        return $this->arrivaldate;
    }

    /**
     * @param mixed $arrivaldate
     */
    public function setArrivaldate($arrivaldate)
    {
        $this->arrivaldate = $arrivaldate;
    }

    /**
     * @return mixed
     */
    public function getNumberofdays()
    {
        return $this->numberofdays;
    }

    /**
     * @param mixed $numberofdays
     */
    public function setNumberofdays($numberofdays)
    {
        $this->numberofdays = $numberofdays;
    }

    /**
     * @return mixed
     */
    public function getSpecialrequest()
    {
        return $this->specialrequest;
    }

    /**
     * @param mixed $specialrequest
     */
    public function setSpecialrequest($specialrequest)
    {
        $this->specialrequest = $specialrequest;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}