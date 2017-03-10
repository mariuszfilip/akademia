<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\PageInfoShow as PageInfo;
use AppBundle\Entity\PageInfoDescription;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $page = new PageInfo();
        $page->setTitle("Title");
        $page->setDescription("Desc");

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
            'page' => $page
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
        $page = new PageInfoDescription();
        $page->setTitle("Title : " . $id);
        $page->setDescription("Desc");


        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
            'page' => $page
        ]);
    }
}
