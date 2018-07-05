<?php
namespace App\Models;
defined("PATH_RAIZ") OR die("Access denied");

use \Core\Database;
use \Core\Model; 
use \App\Interfaces\Crud ;

class Cuentas extends Model  
{

    public function __construct(){

        self::set_table("cuenta");
    }

    public function insert($form = array()){

    	$registro_exitoso = true;



    	$sql = "INSERT into ".self::$table ." values (:id , :tarjeta , :clave , :coordenadas , :respuesta )  "; 


    	return $registro_exitoso; 
    }


    public static function str_coordenadas($arreglo = array()){

		$longitud = 64;
		$string = "";

    		for ($i=0; $i < $longitud ; $i++)
					$string .= $arreglo[$i].";";

		return $string;		
    }

    public static function reverse_coordenadas($string){

    	$longitud = 64;
		$arreglo = array(); 

    		for ($i=0; $i < $longitud ; $i++)
				$arreglo[$i] = substr($string, ($i * 4) , 3 );

		return $arreglo;
    }

    public static function cifrado( $usuario, $clave ){

    	return hash('sha256',  md5($usuario) . md5($clave) ); 
    }
 
    
}

