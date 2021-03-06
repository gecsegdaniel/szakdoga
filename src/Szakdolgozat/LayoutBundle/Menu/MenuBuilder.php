<?php
namespace Szakdolgozat\LayoutBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class MenuBuilder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Főoldal', array('route' => 'homepage'));
        $menu->addChild('Apartmanok', array('route' => 'apartmanok'));
        $menu->addChild('Kapcsolat', array('route' => 'kapcsolat'));

        return $menu;
    }
}