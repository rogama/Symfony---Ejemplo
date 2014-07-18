<?php

namespace Rogama\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $response = new Response('Hola mundo!!!');
        return $response;

        //return $this->render('DemoBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function articulosAction() {
        // Simulamos obtener los datos de la base de datos cargando los articulos a un array
        
        $articulos = array(
            array('id' =>1, 'title' => 'Articulo numero 1', 'created' => '2011-01-01'),
            array('id' =>2, 'title' => 'Articulo numero 2', 'created' => '2011-01-01'),
            array('id' =>3, 'title' => 'Articulo numero 3', 'created' => '2011-01-01'),
        );
        return $this->render('DemoBundle:Default:articulos.html.twig', array('articulos'=>$articulos));
    }
    
    public function articuloAction($id) {
        // Simulamos obtener los datos de la base de datos cargando los articulos a un array
        
        $articulos = array(
            array('id' =>1, 'title' => 'Articulo numero 1', 'created' => '2011-01-01'),
            array('id' =>2, 'title' => 'Articulo numero 2', 'created' => '2011-01-01'),
            array('id' =>3, 'title' => 'Articulo numero 3', 'created' => '2011-01-01'),
        );
        
        $articuloSeleccionado = null;
        foreach ($articulos as $articulo){
            if($articulo['id']== $id){
                $articuloSeleccionado = $articulo;
                break;
            }
        }
        return $this->render('DemoBundle:Default:articulo.html.twig', array('articulo'=>$articuloSeleccionado));
    }
}
