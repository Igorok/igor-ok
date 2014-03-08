<?php

namespace Demos\BlogBundle\Controller;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Demos\BlogBundle\Entity\Project;
use Symfony\Component\HttpFoundation\Response;
use Ext\DirectBundle\Response\KnpPaginator;


class ProjectController extends Controller
{
    /**
     * @Route("/project/", name="_default_project")
     * @Template()
     */
    public function indexAction()
    {
        $project = $this->getDoctrine()->getRepository('DemosBlogBundle:Project')->findBy(
            array(),
            array('created_time'=>'DESC')
        );
        
        $paginator  = $this->get('knp_paginator');
         
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $project,
            $this->get('request')->query->get('page', 1)/*page number*/,
            9/*limit per page*/
        );

        if (!$project) {
            throw $this->createNotFoundException('Страница не найдена!');
        }
        return array('pagination' => $pagination);
    }
    
}
