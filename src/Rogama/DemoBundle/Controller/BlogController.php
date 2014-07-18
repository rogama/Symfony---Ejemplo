<?php

namespace Rogama\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * 
 * @author Rogama
 */
class BlogController extends Controller{
    public function indexAction() {
        $producto = false; //imitamos que hemos hecho una consulta y no encontramos el producto
        
        if(!$producto){
            throw $this->createNotFoundException('No existe el producto');
        }
        
        return $this->render('');
    }
    public function showAction($slug) {
        //recuperar el request sin pasarlo como parametro
        $peticion = $this->getRequest();
        
        $articulo = $peticion->get('slug'); // otra forma para obtener comodines, GET o POST    
        //$articulo = $slug;
        $metodo = $peticion->getMethod(); //obtenemos si la petición fue por GET o POS
                 
        return $this->render('DemoBundle:Blog:show.html.twig', array('articulo'=>$articulo));
    }
}
