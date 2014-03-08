<?php

namespace Demos\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Demos\BlogBundle\Entity\Project;
use Demos\BlogBundle\Entity\About;
use Demos\BlogBundle\Entity\Contact;
use Demos\BlogBundle\Entity\Comments;
use Demos\BlogBundle\Form\ContactType;
use Demos\BlogBundle\Form\CommentsType;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\ArrayCollection; 


class DefaultController extends Controller
{
    /**
     * @Route("/", name="_default")
     * @Template()
     */
    public function indexAction()
    {
        $project = $this->getDoctrine()->getRepository('DemosBlogBundle:Project')->findBy(
            array(),
            array('created_time' => 'DESC')
        );
        //var_dump($project);exit;
        
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
    
    /**
     * @Route("/about/", name="_default_about")
     * @Template()
     */
    public function aboutAction()
    {
        $about = $this->getDoctrine()->getRepository('DemosBlogBundle:About')->find(1);
        if (!$about) {
            throw $this->createNotFoundException('Страница не найдена!');
        }
        return array('about' => $about);
    }
    
    /**
     * @Route("/contact/", name="_default_contact")
     * @Template()
     */
    public function contactAction()
    {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);
        
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            //$form->bindRequest($request);
            $form->submit($request);
            
            if ($form->isValid()) {                
                $message = \Swift_Message::newInstance()
                    ->setSubject('Contact enquiry from symblog')
                    ->setFrom('igorok@ipatovsoft.ru')
                    ->setTo('igordubinin1@yandex.ru')
                    ->setBody($this->renderView('DemosBlogBundle:Contact:contactEmail.txt.twig', array('contact' => $contact)));
                $this->get('mailer')->send($message);
                
//                $headers="From: 'enquiries@symblog.co.uk'\r\nReply-To: igordubinin1@yandex.ru";
//                mail('igordubinin1@yandex.ru','Contact enquiry from symblog',$message,$headers);
                                                
                return $this->redirect($this->generateUrl('_default_thanks'));
            }
        }
        //var_dump($form->createView());exit;
        return array('form' => $form->createView());
    }
    
    
    /**
     * @Route("/newcomment/{postId}", name="_default_comment")
     * @Template()
     */
    public function commentAction($postId)
    {
        
        // получение запроса
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $comment = new Comments();
            $form = $this->createForm(new CommentsType(), $comment);
            $form->handleRequest($request);
            
            if ($form->isValid()) {
                $comment->setCreatedTime(new \DateTime("now"));
                $onePost = $this->getDoctrine()->getRepository('DemosBlogBundle:Post')->find($postId);
                $comment->setPostId($onePost);
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();
                return $this->redirect($this->generateUrl('_default_post_show', array('id' => $postId,'PostUrl'=>$onePost->getPostUrl())));
            }
        }
        else{
            return $this->redirect($this->generateUrl('_default'));
        }
        
    }
    
    /**
     * @Route("/thanks/", name="_default_thanks")
     * @Template()
     */
    public function thanksAction()
    {   
        $thanksMessage = 'Спасибо за использование нашей формы!';
        return array('thanksMessage'=>$thanksMessage);
    }
    
    
}
