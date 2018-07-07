<?php
namespace App\Controllers;

require_once PATH_LIBS.'phpword/PHPWord-master/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;

use \Core\Controller,
    \Core\View, 
     \App\Models\Cursos as Modelo;

defined("PATH_RAIZ") OR die("Access denied");
 
class Reportes extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);

        $this->modelo = new Modelo(); 
    }


   public function estudiantes($id){

    $templateWord = new TemplateProcessor('storage/estudiante.docx');
 
    $nombre = "Sandra S.L.";
    $direccion = "Mi dirección";
    $municipio = "Mrd";
    $provincia = "Bdj";
    $cp = "02541";
    $telefono = "24536784";


    // --- Asignamos valores a la plantilla
    $templateWord->setValue('nombre_empresa',$nombre);
    $templateWord->setValue('direccion_empresa',$direccion);
    $templateWord->setValue('municipio_empresa',$municipio);
    $templateWord->setValue('provincia_empresa',$provincia);
    $templateWord->setValue('cp_empresa',$cp);
    $templateWord->setValue('telefono_empresa',$telefono);

    // --- Guardamos el documento
    $templateWord->saveAs('storage/notas/armando.DOCX');

    header("Content-Disposition: attachment; filename=Documento02.docx; charset=iso-8859-1");
    echo file_get_contents('armando.DOCX');
      	
  }

  
}
