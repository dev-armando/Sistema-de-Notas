<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
     \App\Models\Usuarios as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
 
class Usuarios extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);

        $this->modelo = new Modelo(); 
    }


   public function login(){

      	$datos = json_decode(file_get_contents("php://input"));

       	$resultado =  $this->modelo->validarIngreso($datos->usuario, $datos->clave);

       	echo $resultado; 
    }

    public function salir(){

    	// destruye la session activa 
    	$this->modelo->cerrarSession(); 
    	// devolver al la raiz
    	header('location:../../');
    }




  
}
