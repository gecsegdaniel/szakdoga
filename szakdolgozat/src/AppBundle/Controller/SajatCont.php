<?php
/**
 * Created by PhpStorm.
 * User: Dani
 * Date: 2015.11.22.
 * Time: 17:14
 */

namespace AppBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SajatCont extends Controller
{
    public function teszetelekAction()
    {
        return $this->render('AppBundle::teszetelek.html.twig');
    }
}

?>