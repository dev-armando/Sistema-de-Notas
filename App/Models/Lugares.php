<?php
namespace App\Models;
defined("PATH_RAIZ") OR die("Access denied");

use \Core\Database;
use \Core\Model; 
use \App\Interfaces\Crud ;

class Lugares extends Model  
{

    public function __construct(){

        self::set_table("lugares");
    }
  
    public function get(){

        $this->set_sql("SELECT lugar_id as id , descripcion as texto  from lugares "); 
        return $this->execute_query();
    }

  


    
}

