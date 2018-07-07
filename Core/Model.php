<?php
namespace Core;

use Core\Database;

defined("PATH_RAIZ") OR die("Access denied");

class Model
{
	static protected $table;
	static protected $sql;  

    public function __construct($nom_table)
    {
    	self::$table = $nom_table; 
    }


    //Función que devuelve un array listo para ejecutar en una consulta preparada
	public static function set_array($arreglo=array()){
			//Creamos un nuevo arreglo vacío
		$arreglo_preparado=array();
			//Recorremos el arreglo que le hemos pasado como parámetro con sus claves
			//y valores correspondientes

			//Por cada vuelta del siguiente bucle foreach vamos asignando claves y valores a nuestro
			//nuevo arreglo con el formato :clave=>valor para que pueda ser utilizado en la consulta
			//preparada
		foreach($arreglo as $dato=>$valor)
				$arreglo_preparado[':'.$dato]=$valor;
			//Y finalmente devolvemos un arreglo listo para ser usado dentro de nuestra consulta
			//preparada
		return $arreglo_preparado;
	}

	public static function set_sql($_sql)
	{
		self::$sql = $_sql; 
	}

	public static function set_table($_sql)
	{
		self::$table = $_sql; 
	}




     public static function execute_query($datos = array())
    {
        try {
			$connection = Database::instance();
			$sql = self::$sql;
			$query = $connection->prepare($sql);
			$query->execute(self::set_array($datos) );

			if( $sql[0] == 'S' )
				return ($query->fetchAll());
			else
				return true; 
		}
        catch(\PDOException $e)
        {
        
			return false;
		}
    }

    public static function get_all(){
    	
    	$t = self::$table; 

    	self::set_sql( "SELECT * from $t " ); 

    	return self::execute_query(); 
    }


    public static function get_byId($id){
    	
    	$t = self::$table; 

    	self::set_sql( "SELECT * from $t where id = :id " ); 

    	return self::execute_query(array("id" => $id )); 
    }

    public static function encrypt($dato , $llave){

    	self::set_sql( "SELECT  AES_encrypt( :dato , :llave )  " ); 

    	return self::execute_query(array("dato" => $dato , "llave" => $llave )); 
    }


     public static function decrypt($dato , $llave){

    	self::set_sql( "SELECT  AES_decrypt( :dato , :llave )  " ); 

    	return self::execute_query(array("dato" => $dato , "llave" => $llave )); 
    }


    public static function sha256($dato){

    	return hash("sha256",$dato);

    }



}
