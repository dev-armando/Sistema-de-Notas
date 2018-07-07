<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
     \App\Models\Usuarios as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
// Controlador para Hacer Pruebas 
class Test extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);
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
