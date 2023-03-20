<?php
// src/Services/ComplexObject.php
namespace App\Services;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class Admin
{
    private $request;
    private $username;
    private $password;

    public function __construct(Request $request){
        $this->request = $request;
        $this->username = $request->request->get('username');
        $this->password = $request->request->get('password');
    }
    public function login(){

        if( ($this->username=='Joe') && ($this->password=='Joe48') )
        {
            return new Response(
                '<button type="button" class="btn btn-dark"><a href="admin.php">Accés au Dash Board</a></button>',
            );
        }

        else{
            return new Response(
                '<html>
                <body>
                <form method="post" action="">
                <div class="form-group">
                    <label for="username">Pseudo :</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>

            </body></html>'
            );
        }
    }
}