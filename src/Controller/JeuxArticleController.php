<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

class JeuxArticleController extends AbstractController
{

    /**
     * @Route("/jeux", name="jeux")
     */

    public function jeux()
    {
        $jeux = $this->getDoctrine()
            ->getRepository(Jeux::class)
            ->findAll();

        return $this->render('jeux_article/index.html.twig', [
            'jeux' => $jeux,
        ]);
    }
}
