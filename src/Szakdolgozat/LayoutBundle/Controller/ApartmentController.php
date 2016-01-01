<?php

namespace Szakdolgozat\LayoutBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class ApartmentController extends Controller
{
    public function apartmentAction($id)
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

            $rooms = $apartment->getRooms();

            return $this->render('SzakdolgozatLayoutBundle::apartment.html.twig', array( 'apartment' => $apartment, 'options' => $options, 'rooms' => $rooms));
        }
        return $this->redirectToRoute('homepage');

    }

    public function apartmentsAction(Request $request)
    {
        $apartmentRepository = $this->getDoctrine()->getManager()->getRepository('SzakdolgozatLayoutBundle:Apartment');
        $apartments = $apartmentRepository->findAll();

        $defaultData = array('name' => '');
        $form = $this->createFormBuilder($defaultData)
            ->add('name', TextType::class, array('label' => 'Apartman', 'required' => false))
            ->add('save', SubmitType::class, array('label' => 'Keres'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $name = $form->getData();

            if($name['name'] != ''){
                $em = $this->getDoctrine()->getManager();
                $qb = $em->createQueryBuilder();

                $q  = $qb->select(array('p'))
                    ->from('SzakdolgozatLayoutBundle:Apartment', 'p')
                    ->where(
                        $qb->expr()->like('p.name', ':pName')

                    )
                    ->setParameter('pName', '%'.$name['name'].'%')
                    ->getQuery();

                $apartments = $q->getResult();
            }
        }

        return $this->render('SzakdolgozatLayoutBundle::apartments.html.twig', array( 'apartments' => $apartments, 'form' => $form->createView()));
    }
}
