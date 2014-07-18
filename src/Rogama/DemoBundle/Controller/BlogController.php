<?php

namespace Rogama\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * 
 * @author Rogama
 */
class BlogController extends Controller{
    public function showAction($slug) {
        //$articulo = $slug;
        
        $peticion = $this->getRequest();
        
         $articulo = $peticion->get('slug'); // otra forma para obtener comodines, GET o POST    
         $metodo = $peticion->getMethod(); //obtenemos si la petición fue por GET o POS
                 
        return $this->render('DemoBundle:Blog:show.html.twig', array('articulo'=>$articulo));
    }
}
