<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(SessionInterface $session): Response
    {

        // stores an attribute for reuse during a later user request
        $session->set('foo', 'bar');

        // gets the attribute set by another controller in another request
         $foobar = $session->get('foobar');

        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
