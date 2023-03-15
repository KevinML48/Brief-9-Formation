<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
     /**
     * @Route("/articles", name="articles")
     */
    public function articles()
    {
        return $this->render('jeux.html.twig', [
            'title' => "Mon premier essai symfony"
       ]);
    }
}