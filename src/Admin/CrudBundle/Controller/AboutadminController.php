<?php

namespace Admin\CrudBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Demos\BlogBundle\Entity\About;
use Admin\CrudBundle\Form\AboutType;

/**
 * About controller.
 *
 * @Route("/about")
 */
class AboutadminController extends Controller
{

    /**
     * Lists all About entities.
     *
     * @Route("/", name="about")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DemosBlogBundle:About')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new About entity.
     *
     * @Route("/", name="about_create")
     * @Method("POST")
     * @Template("AdminCrudBundle:Aboutadmin:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new About();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setCreatedTime(new \DateTime("now"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('about_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a About entity.
    *
    * @param About $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(About $entity)
    {
        $form = $this->createForm(new AboutType(), $entity, array(
            'action' => $this->generateUrl('about_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new About entity.
     *
     * @Route("/new", name="about_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new About();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a About entity.
     *
     * @Route("/{id}", name="about_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemosBlogBundle:About')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find About entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing About entity.
     *
     * @Route("/{id}/edit", name="about_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemosBlogBundle:About')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find About entity.');
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
    * Creates a form to edit a About entity.
    *
    * @param About $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(About $entity)
    {
        $form = $this->createForm(new AboutType(), $entity, array(
            'action' => $this->generateUrl('about_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing About entity.
     *
     * @Route("/{id}", name="about_update")
     * @Method("POST")
     * @Template("AdminCrudBundle:Aboutadmin:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DemosBlogBundle:About')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find About entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('about_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a About entity.
     *
     * @Route("/about_delete/{id}", name="about_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DemosBlogBundle:About')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find About entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('about'));
    }

    /**
     * Creates a form to delete a About entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('about_delete', array('id' => $id)))
            ->setMethod('POST')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
