<?php

/**
 * Description of NoticeController
 *
 * @author Roberto
 */
namespace Rogama\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NoticeController extends Controller{
    private  $array_notice = array(
                array(
                    'title'=>'Titulo de noticia 0',
                    'content'=>'Contenido de la noticia 0'
                ),
                array(
                    'title'=>'Titulo de la noticia 1',
                    'content'=>'Titulo de la noticia 1'
                )
    );
    
    public function indexAction() {
        return $this->render('DemoBundle:Notice:index.html.twig', array('notices'=>$this->array_notice));
    }
    
    public function noticeViewAction($notice_id) {
        $notice = $this->array_notice[$notice_id];
        return $this->render('DemoBundle:Notice:noticeView.html.twig', array('notice'=>$notice));
    }
}
