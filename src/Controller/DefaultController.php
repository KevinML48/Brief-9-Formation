<?php

namespace App\Controller;

use App\Repository\JeuxRepository;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route ('/categories', name: 'categories_')]
class DefaultController extends AbstractController
{

    
    private $genreRepository;

    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function index(GenreRepository $genreRepository): Response
    {
        $genres = $this->genreRepository->findAll();
      /* dd($genre); */

        return $this->render('category/index.html.twig', [
            'genres' => $genres,
        ]);
    }

    #[Route ('/categorie/{id}', name: 'categories')]
    public function jeuxParCategorie(JeuxRepository $jeuxRepository, GenreRepository $genreRepository, $id): Response
    {
        $genres = $genreRepository->find(array('id' => $id));
        $jeux = $genres->getJeuxes();

        return $this->render('category/genre.html.twig', [
            'categorie' => $genres,
            'jeux' => $jeux,
        ]);
    }
}
