<?php

namespace App\Controllers;
use \Core\View;
use \App\Models\User;

defined("PATH_RAIZ") OR die("Access denied");
 
class Home
{

	
    public function saludo($nombre)
    {
      
        View::set("user", $nombre);
        View::set("title", "Custom MVC");
        View::render("home");
    }

    public function test(){
        print_r(User::test()['nombre']);
    }
}
