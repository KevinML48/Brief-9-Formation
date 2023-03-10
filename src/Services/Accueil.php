<?php
// src/Services/ComplexObject.php
namespace App\Services;

use Symfony\Component\HttpFoundation\Response;

class Accueil
{

    
    public function __construct(
       
    )
    {
        
    }

    public function faisCoucou() : Response 
    {
        return new Response(
            '<html><body>Bienvenue</body></html>'
        );
    }
}