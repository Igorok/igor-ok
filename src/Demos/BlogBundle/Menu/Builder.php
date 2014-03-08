<?php
// src/Acme/MainBundle/Menu/MenuBuilder.php

namespace Demos\BlogBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class Builder
{
    public function leftMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        //$menu->setCurrentUri($this->container->get('request')->getRequestUri());
        
        $menu->addChild('Главная', array('route' => '_default'));
        $menu->addChild('Новости', array('route' => '_default_news'));
        $menu->addChild('Статьи', array('route' => '_default_post'));
        // ... add more children

        return $menu;
    }
    
    public function rightMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        //$menu->setCurrentUri($this->container->get('request')->getRequestUri());
        
        $menu->addChild('Портфолио', array('route' => '_default_project'));
        $menu->addChild('Контакты', array('route' => '_default_contact'));
        $menu->addChild('Об авторе', array('route' => '_default_about'));
        // ... add more children

        return $menu;
    }
}