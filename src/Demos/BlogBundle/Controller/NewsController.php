<?php

namespace Demos\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Demos\BlogBundle\Entity\News;
use Symfony\Component\HttpFoundation\Response;



class NewsController extends Controller
{
    /**
     * @Route("/news/", name="_default_news")
     * @Template()
     */
    public function indexAction()
    {
        // запрос одного поста, выбор по статусу, сортировка по времени
        $news = $this->getDoctrine()->getRepository('DemosBlogBundle:News')->findBy(
            array('status_id' => '1'),
            array('created_time' => 'DESC')
        );
        
        $paginator  = $this->get('knp_paginator');
         
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $news,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        
        if (!$news) {
            throw $this->createNotFoundException('Страница не найдена!');
        }
        return array('pagination' => $pagination);
    }
    
    /**
    * @Route("/news/{id}/{NewsUrl}", name="_default_news_show")
    * @Template()
    */
    public function showAction($id)
    {
        //echo $id;exit;
        
        $news = $this->getDoctrine()->getRepository('DemosBlogBundle:News')->find($id);
        
        //get status id 
        //$newsStatusId = $news->getStatusId()->getId();
        
        if (!$news || $newsStatusId = $news->getStatusId()->getId() != 1) {
            throw $this->createNotFoundException('404 Страница не найдена!');
        }
        else {
            return array('news' => $news);
        }
        
    }
}
