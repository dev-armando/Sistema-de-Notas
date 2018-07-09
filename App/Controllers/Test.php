<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
    \Core\Helpers as P, 
     \App\Models\Usuarios as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
// Controlador para Hacer Pruebas 
class Test extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);
    }

    public function fecha(){

        echo P::formato_fecha('20180910');
    }

    public function modelo(){

    	$modelo = new Modelo(); 

    	var_dump( $modelo->get_all() );
    }


    public function post()
    {        
        
        View::render('Test/post');
        
    }

    public function get($id){

        var_dump($id);
    }



  
}
