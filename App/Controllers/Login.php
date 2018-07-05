<?php
namespace App\Controllers;


use \Core\Controller; 
use \App\Models\User;

defined("PATH_RAIZ") OR die("Access denied");
 
class Login extends Controller
{

	public function __construct(){

    
        parent::__construct(__CLASS__);

    }


    public function ingresar()
    {
    
                
         $this->vista("ingresar","login"); 

; 


        //View::set("user", "exito");
        //View::set("title", "Custom MVC");
        
    }



     public function salir(){


        header('location:../login/ingresar');
    }

  

  
}
