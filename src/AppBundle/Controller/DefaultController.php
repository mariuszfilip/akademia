<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR
        ]);
    }

    /**
     * @Route("/", name="navbar")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function navbarAction()
    {
        return $this->render('default/navbar.html.twig');
    }

    /**
     * @Route("/show/{id}",name="show")
     */
    public function showAction(Request $request, $id)
    {


        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR
        ]);
    }
}
