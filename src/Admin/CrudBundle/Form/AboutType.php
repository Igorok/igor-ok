<?php

namespace Admin\CrudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AboutType extends AbstractType
{
    /**
    * @param FormBuilderInterface $builder
    * @param array $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('label' => 'Заголовок'))
            ->add('meta_keywords', 'text', array('label' => 'Meta keywords'))
            ->add('meta_description', 'text', array('label' => 'Meta description'))
            ->add('description', 'textarea', array('label' => 'Новость'))
            ->add('image', 'iphp_file', array('label' => 'Картинка', 'required' => false))
            //->add('created_time', null, array('label' => 'Время создания'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Demos\BlogBundle\Entity\About'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_crudbundle_about';
    }
}
