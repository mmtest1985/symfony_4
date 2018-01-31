<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller {

    public function index(Request $request, SessionInterface $session) {
        
        var_dump($request->headers->get('host'));
        
        $session->set('foo', 'bar');
        
        $foobar = $session->get('foo');
        
        
        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

        $number = mt_rand(0, 100);
        
        $url = $this->generateUrl('app_lucky_number', array('max' => 10));

        return $this->render('default/index.html.twig', array(
            'number' => $number,
            'url' => $url
        ));
    }

}
