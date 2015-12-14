<?php

namespace SzakdogaBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Szallasok
 */
class Szallasok
{
    /**
     * @var string
     */
    private $nev;

    /**
     * @var string
     */
    private $varos;

    /**
     * @var string
     */
    private $cim;

    /**
     * @var string
     */
    private $leiras;

    /**
     * @var string
     */
    private $opciok;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $kiemelt;

    private $belyegkep;
    private $kepek;
    private $szobak;
    private $opciokTomb;

    public function __construct(){
        $this->kepek = new ArrayCollection();
        $this->szobak = new ArrayCollection();
        $this->opciokTomb = new ArrayCollection();
    }


    public function getBelyegKep(){
        return $this->belyegkep;
    }

    public function setBelyegKep($ujKep){
        if($ujKep == null){                         //ha nem volt találat
            $object = new Galeria();
            $object->setKepnev('nincskep.jpg');
            $object->setSzallasId($this->id);
            $this->belyegkep = $object;
        }
        else{
            if($ujKep->getKepNev() == ''){          //ha üres a mező értéke
                $ujKep->setKepnev('nincskep.jpg');
            }
            $this->belyegkep = $ujKep;
        }
    }

    public function getKepek(){
        return $this->kepek;
    }

    public function addKep($ujKep){
        if($ujKep->getKepNev() == ''){          //ha üres a mező értéke
            $ujKep->setKepnev('nincskep.jpg');
        }
        $this->kepek[] = $ujKep;
    }

    public function setKepek($kepek){
        foreach ($kepek as $kep) {
            if($kep->getKepNev() == ''){        //ha valamely képnév üres
                $kep->setKepnev('nincskep.jpg');
            }
        }
        $this->kepek = $kepek;
    }


    public function getSzobak(){
        return $this->szobak;
    }

    public function setSzobak($szobak){
        $this->szobak = $szobak;
    }


    public function getOpciokTomb(){
        return $this->opciokTomb;
    }

    public function setOpciokTomb(){
        $kepekTomb = new ArrayCollection();
        $lista = explode(';',$this->opciok);
        for($i=0;$i<count($lista);$i++){
            if($lista[$i] == '1'){
                switch($i){
                    case 0 : $kepekTomb[]= new Opciok('icon_klima.png','Klíma');break;
                    case 1 : $kepekTomb[]= new Opciok('icon_tv.png','TV');break;
                    case 2 : $kepekTomb[]= new Opciok('icon_wifi.png','Wi-Fi');break;
                    case 3 : $kepekTomb[]= new Opciok('icon_etterem.png','Étterem');break;
                    case 4 : $kepekTomb[]= new Opciok('icon_parkolo.png','Parkoló');break;
                    case 5 : $kepekTomb[]= new Opciok('icon_mozg.png','Mozgáskorlátozott');break;
                }
            }
        }

        $this->opciokTomb = $kepekTomb;
    }

    /**
     * Set nev
     *
     * @param string $nev
     *
     * @return Szallasok
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
     * Set varos
     *
     * @param string $varos
     *
     * @return Szallasok
     */
    public function setVaros($varos)
    {
        $this->varos = $varos;

        return $this;
    }

    /**
     * Get varos
     *
     * @return string
     */
    public function getVaros()
    {
        return $this->varos;
    }

    /**
     * Set cim
     *
     * @param string $cim
     *
     * @return Szallasok
     */
    public function setCim($cim)
    {
        $this->cim = $cim;

        return $this;
    }

    /**
     * Get cim
     *
     * @return string
     */
    public function getCim()
    {
        return $this->cim;
    }

    /**
     * Set leiras
     *
     * @param string $leiras
     *
     * @return Szallasok
     */
    public function setLeiras($leiras)
    {
        $this->leiras = $leiras;

        return $this;
    }

    /**
     * Get leiras
     *
     * @return string
     */
    public function getLeiras()
    {
        return $this->leiras;
    }

    /**
     * Set opciok
     *
     * @param string $opciok
     *
     * @return Szallasok
     */
    public function setOpciok($opciok)
    {
        $this->opciok = $opciok;

        return $this;
    }

    /**
     * Get opciok
     *
     * @return string
     */
    public function getOpciok()
    {
        return $this->opciok;
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
     * Set kiemelt
     *
     * @param boolean $kiemelt
     *
     * @return Szallasok
     */
    public function setKiemelt($kiemelt)
    {
        $this->kiemelt = $kiemelt;

        return $this;
    }

    /**
     * Get kiemelt
     *
     * @return boolean
     */
    public function getKiemelt()
    {
        return $this->kiemelt;
    }
}
