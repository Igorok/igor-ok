<?php

namespace Admin\CrudBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('label' => 'Заголовок'))
            ->add('news_url', 'text', array('label' => 'Url новости'))
            ->add('meta_keywords', 'text', array('label' => 'Meta keywords'))
            ->add('meta_description', 'text', array('label' => 'Meta description'))
            ->add('short_description', 'textarea', array('label' => 'Краткое содержание'))
            ->add('description', 'textarea', array('label' => 'Новость'))
            ->add('image', 'iphp_file', array('label' => 'Картинка', 'required' => false))
            //->add('created_time', null, array('label' => 'Время создания'))
            ->add('status_id', null, array('label' => 'Статус новости', 'required' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Demos\BlogBundle\Entity\News'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'admin_crudbundle_news';
    }
}
