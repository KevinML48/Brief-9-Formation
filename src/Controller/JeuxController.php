<?php

namespace App\Controller;

use App\Entity\Jeux;
use App\Form\JeuxType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JeuxRepository;

class JeuxController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/jeux', name: 'jeux')]
    public function index(JeuxRepository $jeuxRepository)
    {
        $jeux = $jeuxRepository->findAll();
        return $this->render('jeux/index.html.twig', ['jeux' => $jeux]);
    }

    #[Route('/jeux/add', name: 'jeux_add')]
    public function add(Request $request): Response
    {
        $jeu = new Jeux();

        $form = $this->createForm(JeuxType::class, $jeu);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($jeu);
            $this->entityManager->flush();

            $this->addFlash('success', 'Le jeu a été ajouté avec succès.');

            return $this->redirectToRoute('jeux');
        }

        return $this->render('jeux/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/supprimer/{id}', name: 'supprimer', methods: ['POST'])]
    public function supprimer(Request $request, Jeux $jeu)
    {
        // Vérifie si l'objet $jeu existe
        if (!$jeu) {
            // Si l'objet $jeu n'existe pas, ajoute un message flash et redirige vers la liste des jeux
            $this->addFlash(
                'error',
                'Le jeu que vous essayez de supprimer n\'existe pas.'
            );
            return $this->redirectToRoute('jeux');
        }

        // Vérifie si le jeton CSRF est valide
        if ($this->isCsrfTokenValid('delete' . $jeu->getId(), $request->request->get('_token'))) {
            // Supprime l'objet $jeu de la base de données
            $this->entityManager->remove($jeu);
            $this->entityManager->flush();

            // Ajoute un message flash pour confirmer la suppression et redirige vers la liste des jeux
            $this->addFlash('success', 'Le jeu a été supprimé avec succès.');
        }

        return $this->redirectToRoute('jeux');
    }
    
    #[Route('/jeux/edit/{id}', name: 'jeux_edit')]
public function edit(Request $request, Jeux $jeu): Response
{
    // Vérifie si l'objet $jeu existe
    if (!$jeu) {
        // Si l'objet $jeu n'existe pas, ajoute un message flash et redirige vers la liste des jeux
        $this->addFlash(
            'error',
            'Le jeu que vous essayez de modifier n\'existe pas.'
        );
        return $this->redirectToRoute('jeux');
    }

    $form = $this->createForm(JeuxType::class, $jeu);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->entityManager->flush();

        $this->addFlash('success', 'Le jeu a été mis à jour avec succès.');

        return $this->redirectToRoute('jeux');
    }

    return $this->render('jeux/edit.html.twig', [
        'form' => $form->createView(),
    ]);
}

}