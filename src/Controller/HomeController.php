<?php

namespace App\Controller;

use App\Services\Accueil;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController {
/** 
    *Page d'accueil
    *
    *@Route("/", name="homepage")
    */
    public function index(): Response
    {
            return new Response('
            <nav>
            <ul>
                <li><a href="{{ path(articles) }}">Articles</a></li>
            </ul>
        </nav>
            ');
    }

        

}