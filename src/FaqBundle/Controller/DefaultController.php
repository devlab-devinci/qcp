<?php

namespace FaqBundle\Controller;

use FaqBundle\Entity\Faq;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository(Faq::class);

        $questions = $repository->findAll();

        return $this->render('FaqBundle:Default:index.html.twig',
            ['questions' => $questions]);
    }
}
