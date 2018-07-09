<?php
namespace App\Models;
defined("PATH_RAIZ") OR die("Access denied");

use \Core\Database;
use \Core\Model; 
use \App\Interfaces\Crud ;

class Maestros extends Model  
{

    public function __construct(){

        self::set_table("maestros");
    }

    public function insert($form = array()){

    	$registro_exitoso = true;



    	$sql = "INSERT into ".self::$table ." values (:id , :tarjeta , :clave , :coordenadas , :respuesta )  "; 


    	return $registro_exitoso; 
    }


  
    public function consultarPorIdUsuario($id){

        $this->set_sql("SELECT * from maestros where usuarios_id = :id "); 
        return $this->execute_query(array("id" => $id));
    }

    public function iniciarSession(){

       $resultado = $this->consultarPorIdUsuario($_SESSION['id_usuario']);

       if(count($resultado) > 0){

            $_SESSION['id_maestro'] = $resultado[0]['maestro_id']; 
       }

        
    }

 
 
    
}

