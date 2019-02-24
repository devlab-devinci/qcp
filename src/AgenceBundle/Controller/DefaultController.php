<?php

namespace AgenceBundle\Controller;

use AgenceBundle\Entity\Agence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function frameAction()
    {
        return $this->render('FrontBundle:Tenant:mapFrame.html.twig');
    }

    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository(Agence::class);

        $agencies = $repository->findAll();

        $data = $this->get('serializer')->serialize($agencies, 'json');
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
