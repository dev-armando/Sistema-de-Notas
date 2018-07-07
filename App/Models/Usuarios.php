<?php
namespace App\Models;
defined("PATH_RAIZ") OR die("Access denied");

use \Core\Database;
use \Core\Model; 
use \App\Interfaces\Crud ;

class Usuarios extends Model  
{

    public function __construct(){

        self::set_table("usuarios");
    }

    public function insert($form = array()){

    	$registro_exitoso = true;



    	$sql = "INSERT into ".self::$table ." values (:id , :tarjeta , :clave , :coordenadas , :respuesta )  "; 


    	return $registro_exitoso; 
    }


    public function validarIngreso( $usuario , $clave ){

        $this->set_sql("SELECT * FROM usuarios where  nombre = :usuario and clave = md5(:clave) ");

        $resultados = $this->execute_query( array("usuario" => $usuario , "clave" => $clave  ));


        if(count($resultados) > 0){ 

            $this->guardarDatos($resultados);
            return 1 ;
        }
        else 
            return 0;

    }


    public function guardarDatos($resultados){

        $_SESSION['id_usuario'] = $resultados[0]['usuarios_id']; 
        $_SESSION['id_rol'] = $resultados[0]['rol_id']; 
    }

    public function cerrarSession(){

        unset( $_SESSION['id_usuario'] );
        unset( $_SESSION['id_rol'] );
        unset( $_SESSION['id_maestro'] );
        unset( $_SESSION['id_curso'] );
    }


    public static function cifrado( $usuario, $clave ){

    	return hash('sha256',  md5($usuario) . md5($clave) ); 
    }
 
    
}

