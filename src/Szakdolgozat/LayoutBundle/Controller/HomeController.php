<?php

namespace Szakdolgozat\LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        $apartmentRepository = $this->getDoctrine()->getManager()->getRepository('SzakdolgozatLayoutBundle:Apartment');
        $apartments = $apartmentRepository->findBy(array('highlighted' => 1));

        return $this->render('SzakdolgozatLayoutBundle::homepage.html.twig', array( 'apartments' => $apartments));
    }
}
