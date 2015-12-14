<?php
/**
 * Created by PhpStorm.
 * User: Dani
 * Date: 2015.11.27.
 * Time: 21:53
 */

namespace SzakdogaBundle\Entity;


class Opciok
{
    private $kepnev;
    private $title;

    public function __construct($kepnev, $title){
        $this->kepnev = $kepnev;
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getKepnev()
    {
        return $this->kepnev;
    }


}