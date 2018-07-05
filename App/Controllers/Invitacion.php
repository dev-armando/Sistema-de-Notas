<?php
namespace App\Controllers;
defined("PATH_RAIZ") OR die("Access denied");

use \Core\View,
    \App\Models\User as Users,
    \Core\Controller;

class Invitacion 
{
    
    public function generar()
    {
    
         View::show("invitacion/generar","generar_invitacion");

          


        //View::set("user", "exito");
        //View::set("title", "Custom MVC");
        
    }


 
}
