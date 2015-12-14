<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle::helloka.html.twig');
    }


    /**
     * @Route("/valami", name="valami")
     */
    public function valamiAction(Request $request)
    {
        $uzenet = "KicsiKlaukaszeretlek:D";

        return $this->render('AppBundle::teszetelek.html.twig', array( 'uzenet' => $uzenet,));
    }
}