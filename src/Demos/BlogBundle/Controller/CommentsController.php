<?php

namespace Demos\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Demos\BlogBundle\Entity\Comments;

/**
 * Comments controller.
 *
 * @Route("/comments")
 */
class CommentsController extends Controller
{

    /**
     * Lists all Comments entities.
     *
     * @Route("/", name="comments")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DemosBlogBundle:Comments')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Comments entity.
     *
     * @Route("/{id}", name="comments_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemosBlogBundle:Comments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comments entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
