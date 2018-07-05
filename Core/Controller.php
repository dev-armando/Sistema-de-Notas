<?php
namespace Core;
use \Core\View;

defined("PATH_RAIZ") OR die("A VAINAAAA el mariquito hackerman marikito pues");

class Controller
{

	protected $controller_name; 

	public function test(){

		echo "Funciona el Controller"; 
	}



    public function vista($template , $js = "" ){


        $js = ($js == "" ) ? $template : $js ;

    	View::show( $this->controller_name.'/'.$template  , $this->controller_name.'/'.$js   );	
    }


    public function variables($data){

    	View::setData($data);
    }


    
    public function salir(){


        header('location:../login/principal');
    }


   

    public function __construct($nameClass){

    	// obtener le nombre de clase actual en minuscula
    	// para manejar la estructura de archivos de forma mas eficiente y
    	// estricta 
    	$class = strtolower(  str_replace('App\Controllers\\', "",  $nameClass) ) ;
    	
    	$this->controller_name = $class; 

    }



}
