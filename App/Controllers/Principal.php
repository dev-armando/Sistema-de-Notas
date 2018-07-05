<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
     \App\Models\User;

defined("PATH_RAIZ") OR die("Access denied");
 
class Principal extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);
    }


    public function show()
    {
    
                
        
        View::render('app');



        //View::set("user", "exito");
        //View::set("title", "Custom MVC");
        
    }



  
}
