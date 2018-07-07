<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
     \App\Models\Cursos as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
 
class Cursos extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);

        $this->modelo = new Modelo(); 
    }


   public function iniciar(){

      	
      	if(!isset($_SESSION['id_curso'])  and $_SESSION['id_rol'] == 2 ){

      		$this->modelo->iniciarSession();

      	}

    
    }

  
}
