<?php

namespace Szakdolgozat\LayoutBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $q  = $qb->select(array('Ap'))
            ->from('SzakdolgozatLayoutBundle:Apartment', 'Ap');

        $defaultData = array('name' => '', 'city' => '');
        $form = $this->createFormBuilder($defaultData)
            ->add('name', TextType::class, array('label' => 'Apartman', 'required' => false))
            ->add('city', EntityType::class, array(
                'class' => 'SzakdolgozatLayoutBundle:City',
                'choice_label' => 'city',
                'label' => 'Város',
                'required' => false,
                'placeholder' => 'Nincs kiválasztva',
                'empty_data'  => null
            ))
            ->add('save', SubmitType::class, array('label' => 'Keres'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $name = $form->getData();

            if($name['name'] != '' AND $name['city'] != null){
                $q  = $q->where($qb->expr()->like('Ap.name', ':pName'))
                    ->andWhere('Ap.city_id = :pCityId')
                    ->setParameter('pName', '%'.$name['name'].'%')
                    ->setParameter('pCityId', $name['city']->getId())
                    ->getQuery();
            } elseif($name['name'] != '' AND $name['city'] === null){
                $q  = $q->where($qb->expr()->like('Ap.name', ':pName'))
                    ->setParameter('pName', '%'.$name['name'].'%')
                    ->getQuery();
            } elseif($name['name'] == '' AND $name['city'] != null){
                $q  = $q->where('Ap.city_id = :pCityId')
                    ->setParameter('pCityId', $name['city']->getId())
                    ->getQuery();
            }
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $q,
            $request->query->getInt('page', 1),2
        );

        return $this->render('SzakdolgozatLayoutBundle::apartments.html.twig', array('pagination' => $pagination, 'form' => $form->createView()));
    }
}
