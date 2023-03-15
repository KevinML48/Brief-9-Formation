<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\JeuxRepository;

class JeuxApplicationController extends AbstractController
{
    #[Route('/jeux/application', name: 'app_jeux_application')]
    public function index(JeuxRepository $JeuxRepository): Response
    {

        $jeux = $JeuxRepository->findLastJeux();
    
        return $this->render('jeux_application/index.html.twig', [
            'jeux' => $jeux,
        ]);
    }
}
