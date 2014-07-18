<?php

namespace Rogama\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * 
 * @author Rogama
 */
class BlogController extends Controller{
    public function showAction($slug) {
        $articulo = $slug;
        return $this->render('DemoBundle:Blog:show.html.twig', array('articulo'=>$articulo));
    }
}
