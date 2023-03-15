<?php
namespace App\Controller;
use App\Services\Admin;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * Page d'accueil
     *
     * @Route("/", name="admin")
     **/
    public function admin()
    {
        $request = Request::createFromGlobals();
        $admin = new Admin($request);
        return $admin->login();
        
    }
}   