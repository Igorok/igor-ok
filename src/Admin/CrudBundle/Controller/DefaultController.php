<?php

namespace Admin\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Demos\BlogBundle\Entity\Project;
use Demos\BlogBundle\Entity\About;
use Demos\BlogBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="_admin_main")
     * @Template()
     */
    public function indexAction()
    {
        $project = $this->getDoctrine()->getRepository('DemosBlogBundle:Project')->findAll();
        $oneNews = $this->getDoctrine()->getRepository('DemosBlogBundle:News')->findOneBy(
            array('status_id' => '1'),
            array('created_time' => 'DESC')
        );
        $onePost = $this->getDoctrine()->getRepository('DemosBlogBundle:Post')->findOneBy(
            array('status_id' => '1'),
            array('created_time' => 'DESC')
        );

        if (!$project || !$oneNews || !$onePost) {
            throw $this->createNotFoundException('Страница не найдена!');
        }
        return array('project' => $project,'oneNews' => $oneNews,'onePost' => $onePost,);
    }
    
    
}
