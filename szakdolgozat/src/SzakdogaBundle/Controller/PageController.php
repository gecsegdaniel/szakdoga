<?php

/**
 * Created by PhpStorm.
 * User: Dani
 * Date: 2015.11.22.
 * Time: 18:06
 */

namespace SzakdogaBundle\Controller;

use Proxies\__CG__\SzakdogaBundle\Entity\Szobak;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class PageController extends Controller
{
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        //kiemelt szállások lekérdezése
        $repoSzallasok = $em->getRepository('SzakdogaBundle:Szallasok');
        $szallasok = $repoSzallasok->findBy(array('kiemelt' => 1));

        $repoKepek = $em->getRepository('SzakdogaBundle:Galeria');
        foreach($szallasok as $szallas){
            $kep = $repoKepek->findOneBy(array('szallasId' => $szallas->getId()));
            $szallas->setBelyegKep($kep);
        }

        if ($request->getMethod()=='POST'){
            $session->clear();
            $email = $request->get('email');
            $pass = $request->get('password');

            $repo = $em->getRepository('SzakdogaBundle:Users');
            $user = $repo->findOneBy(array('email' => $email));

            if($user AND $user->getPass() == md5($pass.''.$user->getSalt())){
                $session->set('user',$user);
                $user->setUtolsobelep();
                $em->flush();

                return $this->render('SzakdogaBundle:Page:index.html.twig', array('usrsess' => $session->get('user'), 'szallasok' => $szallasok));
            }
            return $this->render('SzakdogaBundle:Page:index.html.twig', array('user' => 'Hibásadat', 'szallasok' => $szallasok));
        }

        return $this->render('SzakdogaBundle:Page:index.html.twig', array('usrsess' => $session->get('user'), 'szallasok' => $szallasok));
    }

    public function szallasokAction($oldal, Request $request){
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        //a szállások kikeresése
        $repoSzallasok = $em->getRepository('SzakdogaBundle:Szallasok');
        $limit = 4;
        $offset = ($oldal-1)*$limit;
        $szallasok = $repoSzallasok->findBy(array('kiemelt'=>1),array('id' => 'ASC'),$limit,$offset);

        //bélegykép a szállásokhoz
        $repoKepek = $em->getRepository('SzakdogaBundle:Galeria');
        foreach($szallasok as $szallas){
            $kep = $repoKepek->findOneBy(array('szallasId' => $szallas->getId()));
            $szallas->setBelyegKep($kep);
        }

        return $this->render('SzakdogaBundle:Page:szallasok.html.twig', array('usrsess' => $session->get('user'), 'szallasok' => $szallasok));
    }

    public function kapcsolatAction(Request $request)
    {
        $session = $request->getSession();
        return $this->render('SzakdogaBundle:Page:kapcsolat.html.twig', array('usrsess' => $session->get('user')));
    }

    public function logoutAction(Request $request)
    {
        $session = $request->getSession();
        $session->clear();
        return $this->redirectToRoute('szakdoga_homepage');
    }

    public function szallasAction($id, Request $request)
    {
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();

        //az adott szállás kikeresése
        $repoSzallasok = $em->getRepository('SzakdogaBundle:Szallasok');
        $szallas = $repoSzallasok->findOneBy(array('id' => $id));

        if($szallas){
            $szallas->setOpciokTomb();

            //a szálláshoz tartozó képek
            $repoKepek = $em->getRepository('SzakdogaBundle:Galeria');
            $kepek = $repoKepek->findBy(array('szallasId' => $szallas->getId()));
            $szallas->setKepek($kepek);

            //bélyegkép:
            $belyegKep = $repoKepek->findOneBy(array('szallasId' => $szallas->getId()));
            $szallas->setBelyegKep($belyegKep);

            //a szálláshoz tartozó szobák
            $repoSzobak = $em->getRepository('SzakdogaBundle:Szobak');
            $szobak = $repoSzobak->findBy(array('szallasId' => $szallas->getId()));
            $szallas->setSzobak($szobak);

            return $this->render('SzakdogaBundle:Page:szallas.html.twig', array('usrsess' => $session->get('user'), 'szallas' => $szallas));
        }
        return $this->redirectToRoute('szakdoga_homepage');
    }
}