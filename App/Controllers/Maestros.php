<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
     \App\Models\Maestros as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
 
class Maestros extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);

        $this->modelo = new Modelo(); 
    }


   public function iniciar(){

      	
      	if(!isset($_SESSION['id_maestro'])  and $_SESSION['id_rol'] == 2 ){

      		$this->modelo->iniciarSession();

      	}
    }

    public function nombre(){

      echo $this->modelo->consultarPorIdUsuario($_SESSION['id_usuario'])[0]['nombre'];


    }

  
}
