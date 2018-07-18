<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
     \App\Models\Lugares as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
 
class Lugares extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);

        $this->modelo = new Modelo(); 
    }


   public function get(){

      	
        print( json_encode( $this->modelo->get() ) );
    
    }

  
}
