<?php
namespace Rogama\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface ;

/**
 * Description of ArticleTYpe
 *
 * @author Roberto
 */
class ArticleType extends AbstractType {
    public function buildForm(FormBuilderInterface  $builder, array $options) {
        $builder->add('title')
                ->add('author')
                ->add('content')
                ->add('created');
    }
    public function getName() {
        return 'article_form';
    }
}
