<?php

namespace Szakdolgozat\LayoutBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ApartmentController extends Controller
{
    public function indexAction($id)
    {
        if(!is_numeric($id) OR ($id <= 0)){
            return $this->redirectToRoute('homepage');
        }
        $apartmentRepository = $this->getDoctrine()->getManager()->getRepository('SzakdolgozatLayoutBundle:Apartment');
        $apartment = $apartmentRepository->findOneBy(array('id' => $id));

        if($apartment){
            $options = new ArrayCollection();
            if($apartment->isClimate()) $options[] = 'images/icon_klima.png';
            if($apartment->isTv()) $options[] = 'images/icon_tv.png';
            if($apartment->isWifi()) $options[] = 'images/icon_wifi.png';
            if($apartment->isRestaurant()) $options[] = 'images/icon_etterem.png';
            if($apartment->isParking()) $options[] = 'images/icon_parkolo.png';
            if($apartment->isSpecialparking()) $options[] = 'images/icon_mozg.png';

            return $this->render('SzakdolgozatLayoutBundle::apartment.html.twig', array( 'apartment' => $apartment, 'options' => $options));
        }
        return $this->redirectToRoute('homepage');

    }
}
