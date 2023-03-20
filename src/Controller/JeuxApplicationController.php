<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JeuxRepository;

class JeuxApplicationController extends AbstractController
{
    #[Route('/jeux/application', name: 'app_jeux_application')]
    public function index(JeuxRepository $jeuxRepository): Response
    {
        $jeux = $jeuxRepository->findLastJeux();
    
        return $this->render('jeux_application/index.html.twig', [
            'jeux' => $jeux,
        ]);
    }

    #[Route('/jeux/application/{id}', name: 'app_jeux_application_show')]
    public function showArticle(JeuxRepository $jeuxRepository, $id): Response
    {
        $jeu = $jeuxRepository->find($id);
    
        if (!$jeu) {
            throw $this->createNotFoundException('Jeux non trouvé');
        } else {
            return $this->render('jeux_application/jeux.html.twig', [
                'jeu' => $jeu,
            ]);
        }
    }
}
