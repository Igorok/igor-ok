<?php

namespace Admin\CrudBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Demos\BlogBundle\Entity\BlogImage;
use Admin\CrudBundle\Form\BlogImageType;

/**
 * BlogImage controller.
 *
 * @Route("/blogimage")
 */
class BlogImageController extends Controller
{

    /**
     * Lists all BlogImage entities.
     *
     * @Route("/", name="blogimage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DemosBlogBundle:BlogImage')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlogImage entity.
     *
     * @Route("/", name="blogimage_create")
     * @Method("POST")
     * @Template("DemosBlogBundle:BlogImage:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlogImage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setCreatedTime(new \DateTime("now"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blogimage_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlogImage entity.
    *
    * @param BlogImage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlogImage $entity)
    {
        $form = $this->createForm(new BlogImageType(), $entity, array(
            'action' => $this->generateUrl('blogimage_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlogImage entity.
     *
     * @Route("/new", name="blogimage_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlogImage();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlogImage entity.
     *
     * @Route("/{id}", name="blogimage_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemosBlogBundle:BlogImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogImage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlogImage entity.
     *
     * @Route("/{id}/edit", name="blogimage_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemosBlogBundle:BlogImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogImage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a BlogImage entity.
    *
    * @param BlogImage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlogImage $entity)
    {
        $form = $this->createForm(new BlogImageType(), $entity, array(
            'action' => $this->generateUrl('blogimage_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlogImage entity.
     *
     * @Route("/{id}", name="blogimage_update")
     * @Method("POST")
     * @Template("DemosBlogBundle:BlogImage:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemosBlogBundle:BlogImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogImage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blogimage_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlogImage entity.
     *
     * @Route("/{id}", name="blogimage_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DemosBlogBundle:BlogImage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlogImage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blogimage'));
    }

    /**
     * Creates a form to delete a BlogImage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blogimage_delete', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Удалить'))
            ->getForm()
        ;
    }
}
