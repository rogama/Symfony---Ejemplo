<?php

namespace Rogama\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Security Controller
 * 
 * @Route("/admin")
 */
class SecurityController extends Controller {
    
    /**
     * Definimos las rutas pata el login:
     * @Route("/login", name="login")
     * @Route("/login_check", name="login_check")
     */
    public function loginAction() {
        $request =$this->getRequest();
        $session = $request->getSession();
        
        if($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)){
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        }else{
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }
        
        return $this->render('DemoBundle:Security:login.html.twig', array('last_username'=> $session->get(SecurityContext::LAST_USERNAME),
                                                                    'error'=>$error));
    }
}
