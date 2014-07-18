<?php
/**
 * Description of ArticulosController
 *
 * @author Roberto
 */
namespace Rogama\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Rogama\DemoBundle\Entity\Articles;

class ArticulosController extends Controller{
    public function listarAction() {
        $em = $this->getDoctrine()->getEntityManager();
        
        $articulos = $em->getRepository('DemoBundle:Articles')->findAll();
        
        return $this->render('DemoBundle:Articulos:listar.html.twig', array('articulos'=>$articulos));
    }
    public function crearAction() {
        $articulo = new Articles;
        $articulo->setTitle('Articulo de ejemplo 1');
        $articulo->setAuthor('John Doe');
        $articulo->setContent('Contenido');
        $articulo->setTags('ejemplo');
        $articulo->setCreated(new \DateTime());
        $articulo->setUpdated(new \DateTime());
        $articulo->setSlug('articulo-de-ejemplo-1');
        $articulo->setCategory('ejemplo');
        
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($articulo);
        $em->flush();
        
        return $this->render('DemoBundle:Articulos:articulo.html.twig', array('articulo'=>$articulo));
    }
    public function editarAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        
        $articulo = $em->getRepository('DemoBundle:Articles')->find($em);
        $articulo->setTitle('Articulo de ejemplo 1 - modificado');
        $articulo->setUpdated(new \DateTime());
        
        $em->persist($articulo);
        $em->flush();
        
        return $this->render('DemoBundle:Articulos:articulo.html.twig', array('articulo'=>$articulo));
    }
    public function borrarAction($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $articulo = $em->getRepository('DemoBundle:Articles')->find($em);
        
        $em->remove($articulo);
        $em->flush();
        return $this->redirect($this->generateUrl('articulos_listar'));
    }
}
