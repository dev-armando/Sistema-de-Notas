<?php
namespace App\Models;
defined("PATH_RAIZ") OR die("Access denied");

use \Core\Database;
use \Core\Model; 
use \App\Interfaces\Crud ;

class Literales extends Model  
{

    public function __construct(){

        self::set_table("literales");
    }


  
    public function consultar(){

        $this->set_sql("SELECT  l.literal_id as id , CONCAT (  l.nota , ' - ' ,  IF( l.sexo = 'f' , 'Hembra' , 'Varon'  ) )as grado from literales as l WHERE grado_id = :grado "); 

        return $this->execute_query(array("grado" => $_SESSION['id_grado'] )  );
    }


    public function consultarById($id){

        $this->set_sql("SELECT l.descripcion as texto from literales as l WHERE grado_id = :grado AND literal_id = :id "); 

        return $this->execute_query(array("grado" => $_SESSION['id_grado'] , 'id' => $id )  );
    }

    public function editar( $data ){

        extract($data);

        $this->set_sql("UPDATE literales set descripcion = :texto where literal_id = :id"); 
        return $this->execute_query(array('texto' => $texto , 'id' => $id )  );
 


    }

  
        
}




