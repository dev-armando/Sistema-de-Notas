<?php
namespace App\Models;
defined("PATH_RAIZ") OR die("Access denied");

use \Core\Database;
use \Core\Model; 
use \App\Interfaces\Crud ;

class Cursos extends Model  
{

    public function __construct(){

        self::set_table("cursos");
    }
  
    public function consultarPorId($id){

        $this->set_sql("SELECT * from cursos as c inner join periodos as p on p.periodo_id = c.periodo_id  where maestro_id = :id and p.status = 1 "); 
        return $this->execute_query(array("id" => $id));
    }

    public function iniciarSession(){

       $resultado = $this->consultarPorId($_SESSION['id_maestro']);

       if(count($resultado) > 0){

            $_SESSION['id_curso'] = $resultado[0]['curso_id']; 
            $_SESSION['id_grado'] = $resultado[0]['grado_id']; 
       }
  
    }


    
}

