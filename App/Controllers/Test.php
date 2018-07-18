<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
    \Core\Helpers as P, 
     \App\Models\Usuarios as Modelo,
     \App\Models\Estudiantes ;

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

    public function session(){

        var_dump($_SESSION); 
    }


    public function post()
    {        
        
        View::render('Test/post');
        
    }

    public function registro(){

        $n = new Estudiantes();

        $n->consultar();
    }

    public function get($id){

        var_dump($id);
    }



  
}
