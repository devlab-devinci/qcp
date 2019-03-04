<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $articles = $this->getArticles();
        return $this->render('BlogBundle:Default:index.html.twig',
            ['articles' => $articles]);
    }

    public function singleAction($slug)
    {
        $article = $this->showArticle($slug);
        return $this->render('BlogBundle:Default:single.html.twig',
            ['article' => $article]);
    }

    public function getArticles()
    {
        $repository = $this->getDoctrine()->getRepository(Blog::class);
        $articles = $repository->findAll();

        if (!$articles) {
            throw $this->createNotFoundException(
                'No articles found '
            );
        }
        return $articles;
    }

    public function showArticle($id)
    {
        $article = $this->getDoctrine()
            ->getRepository(Blog::class)
            ->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$id
            );
        }
        return $article;
    }
}
