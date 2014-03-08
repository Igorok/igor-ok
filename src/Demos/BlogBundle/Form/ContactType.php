<?php

namespace Demos\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array('label' => 'Имя'));
        $builder->add('email', 'email', array('label' => 'Email'));
        $builder->add('subject', 'text', array('label' => 'Тема'));
        $builder->add('body', 'textarea', array('label' => 'Сообщение'));
        
        //setting the captcha 
         $settings=array(
            'width'=>200,
            'height'=>55,
            'font_size'=>22,
            'length'=>5,
            'border_color'=>"cccccc",
            'label'=>"Введите код с картинки*",
            );
          //add captcha to builder
          $builder->add('captcha', 'genemu_captcha',$settings);
    }

    public function getName()
    {
        return 'contact';
    }
}
