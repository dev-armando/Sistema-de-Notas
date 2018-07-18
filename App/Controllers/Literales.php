<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
     \App\Models\Literales as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
 
class Literales extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);

        $this->modelo = new Modelo(); 
    }


   public function get($id){

        if($id == '*' )
      	   print ( json_encode( $this->modelo->consultar() ) ); 
        else
           print ( json_encode( $this->modelo->consultarById($id) ) ); 

    }

    public function edit(){
      $datos = json_decode(file_get_contents("php://input"));

   

      print (  $this->modelo->editar(array( 'id' => $datos->id , 'texto' => $datos->texto  )) );
    }



  
}
