<?php

namespace Szakdolgozat\LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApartmentsController extends Controller
{
    public function indexAction()
    {
        $apartmentRepository = $this->getDoctrine()->getManager()->getRepository('SzakdolgozatLayoutBundle:Apartment');
        $apartments = $apartmentRepository->findAll();

        return $this->render('SzakdolgozatLayoutBundle::apartments.html.twig', array( 'apartments' => $apartments));
    }
}
