<?php

namespace Rogama\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * 
 * @author Rogama
 */
class BlogController extends Controller{
    public function showAction($slug) {
        //usar una URL declarada en el routing
        $url = $this->generateUrl('blog_mostrar', array('slug'=>'mi-articulo'));
        
    }
}
