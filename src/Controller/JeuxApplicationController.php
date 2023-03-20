<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JeuxRepository;
use Knp\Component\Pager\PaginatorInterface;

class JeuxApplicationController extends AbstractController
{
    #[Route('/jeux/application', name: 'app_jeux_application')]
    public function index(JeuxRepository $jeuxRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $jeuxRepository->paginationQuery(),
            $request->query->getInt('page', 1),
            3
        );
        
        return $this->render('jeux_application/index.html.twig', [
            'pagination' => $pagination
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
