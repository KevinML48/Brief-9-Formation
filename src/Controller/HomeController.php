<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Page d'accueil
     *
     * @Route("/acceuil", name="homepage")
     **/
    public function index()
    {
        return $this->render('menu.html.twig', [
       ]);
    }
}