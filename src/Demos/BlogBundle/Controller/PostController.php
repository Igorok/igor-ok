<?php

namespace Demos\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Demos\BlogBundle\Entity\Post;
use Demos\BlogBundle\Entity\Comments;
use Demos\BlogBundle\Form\CommentsType;
use Symfony\Component\HttpFoundation\Response;



class PostController extends Controller
{
    /**
     * @Route("/post/", name="_default_post")
     * @Template()
     */
    public function indexAction()
    {
        // выбор постов со статусом активен, сортировка по времени
        $post = $this->getDoctrine()->getRepository('DemosBlogBundle:Post')->findBy(
            array('status_id' => '1'),
            array('created_time' => 'DESC')
        );
        // подключение пагинатора
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $post,
            $this->get('request')->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );
        
        if (!$post) {
            throw $this->createNotFoundException('Страница не найдена!');
        }
        return array('pagination' => $pagination);
    }
    
    /**
    * @Route("/post/{id}/{PostUrl}", name="_default_post_show")
    * @Template()
    */
    public function showAction($id)
    {
        //создание формы для комментариев
        $comment = new Comments();
        $form = $this->createForm(new CommentsType(), $comment);
        
        $post = $this->getDoctrine()->getRepository('DemosBlogBundle:Post')->find($id);
        
        if (!$post || $post->getStatusId()->getId() != 1) {
            throw $this->createNotFoundException('Страница не найдена!');
        }
        else {
            return array('post' => $post, 'form' => $form->createView());
        }
        
    }
}
