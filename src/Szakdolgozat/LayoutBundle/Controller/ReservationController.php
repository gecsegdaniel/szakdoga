<?php

namespace Szakdolgozat\LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use Szakdolgozat\LayoutBundle\Entity\Reservation;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReservationController extends Controller
{
    public function myreservationAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $myreservation = $user->getReservations();
        $information = '';
        if(sizeof($myreservation) == 0){
            $information = 'Nincs aktuális foglalása.';
        }

        return $this->render('SzakdolgozatLayoutBundle::myreservation.html.twig', array('reservations' => $myreservation, 'information' => $information));
    }

    public function newreservationAction($id, Request $request)
    {
        if(!is_numeric($id) OR ($id <= 0)){
            return $this->redirectToRoute('homepage');
        }
        $roomRepository = $this->getDoctrine()->getManager()->getRepository('SzakdolgozatLayoutBundle:Room');
        $room = $roomRepository->findOneBy(array('id' => $id));

        if(!$room){
            return $this->redirectToRoute('homepage');
        }

        $statusRepository = $this->getDoctrine()->getManager()->getRepository('SzakdolgozatLayoutBundle:Status');
        $standardStatus = $statusRepository->find(1);

        $reservation = new Reservation();
        $reservation->setUser($this->get('security.token_storage')->getToken()->getUser());
        $reservation->setRoom($room);
        $reservation->setArrivaldate(new \DateTime('tomorrow'));
        $reservation->setStatus($standardStatus);

        $form = $this->createFormBuilder($reservation)
            ->add('numberofdays', IntegerType::class, array('label' => 'Hány napra'))
            ->add('arrivaldate', DateType::class, array('input'  => 'datetime', 'widget' => 'single_text', 'format' => 'yyyy. MM. dd', 'label' => 'Foglalás kezdete'))
            ->add('specialrequest', TextareaType::class, array('label' => 'Megjegyzés', 'required' => false))
            ->add('save', SubmitType::class, array('label' => 'Lefoglal'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $reservation = $form->getData();
            if($reservation){

                $em = $this->getDoctrine()->getManager();
                $em->persist($reservation);
                $em->flush();

                return $this->redirectToRoute('foglalasaim');
            }
        }

        return $this->render('SzakdolgozatLayoutBundle::newreservation.html.twig',array('room' => $room, 'form' => $form->createView()));
    }
}