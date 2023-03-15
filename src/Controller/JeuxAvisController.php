<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Jeux;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use PDO;

class JeuxAvisController extends AbstractController
{
    /**
     * @Route("/jeuxavis/{id}", name="jeuxavis")
     */
    public function jeuxavis($id, EntityManagerInterface $entityManager): Response
    {

        // Exemple de récupération de données depuis une base de données en utilisant PDO
        $pdo = new PDO('mysql:host=localhost;dbname=brief9', 'root', '');
        $stmt = $pdo->prepare('SELECT * FROM avis WHERE jeux_id = :id');
$stmt->execute(['id' => $id]);
$avis_pdo = $stmt->fetchAll();

$jeux = $entityManager->getRepository(Jeux::class)->find($id);
$avis_orm = $entityManager->getRepository(Avis::class)->findBy(['jeux' => $jeux]);

return $this->render('game/show.html.twig', [
    'jeux' => $jeux,
    'avis_pdo' => $avis_pdo,
    'avis_orm' => $avis_orm,
]);
    }
}
