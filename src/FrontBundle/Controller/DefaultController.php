<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }

    public function faqAction()
    {
        return $this->render('FrontBundle:Default:faq.html.twig');
    }


    public function qsnAction()
    {
        return $this->render('FrontBundle:Default:qsn.html.twig');
    }

    public function tenantHomeAction()
    {
        return $this->render('FrontBundle:Tenant:index.html.twig');
    }

    public function investoreHomeAction()
    {
        return $this->render('FrontBundle:Investor:index.html.twig');
    }
}