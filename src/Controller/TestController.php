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
        $session->set('foobar', 'This is session Message');
        $foobar = $session->get('foobar');



        $this->addFlash(
            'notice',
            'This is Flash session message!'
        );

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'foobar' => $foobar
        ]);
    }
}
