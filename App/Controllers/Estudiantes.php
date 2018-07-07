<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
    \Core\Helpers,
     \App\Models\Estudiantes as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
 
class Estudiantes extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);

        $this->modelo = new Modelo(); 
    }




   public function registrar(){

      	
        $datos = json_decode(file_get_contents("php://input"));

        $form = array(

            "nombre" => $datos->nombre, 
            "lugar" => $datos->selectLugar, 
            "sexo" => $datos->sexo, 
            "fecha" => Helpers::sanatize_edad($datos->edad), 
        ); 


        $resultado = $this->modelo->insertar($form);

        if($resultado == 1){

          $form = array(   
            "curso"      => $_SESSION['id_curso'],
            "estudiante" => $this->modelo->consultarPorNombre($datos->nombre)[0]['estudiante_id'],
            "nota" => $datos->nota
          );

          $this->modelo->add_EstudianteCurso($form); 
        }

         
    }

    // genera consulta en JSON 
    public function consultar(){

      echo json_encode( $this->modelo->consultar() );
    }
    // Elimina a un estudiante del curos y de la tabla estudiante
    public function eliminar($id){

      // resultado de eliminar 
    

      $r1 = $this->modelo->deleteEstudianteCurso($id);  
      $r2 = $this->modelo->delete($id);

      if($r1 == true && $r2 == true) echo "1";
      else echo "2";
    }

  
}
