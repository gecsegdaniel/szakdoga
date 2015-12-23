<?php

namespace Szakdolgozat\LayoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('SzakdolgozatLayoutBundle::homepage.html.twig');
    }
}
