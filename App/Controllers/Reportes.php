<?php
namespace App\Controllers;

require_once PATH_LIBS.'phpword/PHPWord-master/src/PhpWord/Autoloader.php';

require_once PATH_LIBS.'phpexcel/PHPExcel/IOFactory.php';



\PhpOffice\PhpWord\Autoloader::register();

use PhpOffice\PhpWord\TemplateProcessor;

use \Core\Controller;
use \Core\Helpers as Ayuda;
 
  

defined("PATH_RAIZ") OR die("Access denied");
 
class Reportes extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);

    }

    // imprimir reporte de la data de los estudiantes en excel 
    public function resumen_de_rendimiento(){

        date_default_timezone_set('Europe/London');

        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load("storage/resumen.xls");

         // cargar datos
        $modelo = new \App\Models\Estudiantes();
        $data = $modelo->consultar();




                                          

        $baseRow = 16;

        $contador = array( 'A' => 0 , 'B' => 0 , 'C' => 0 , 'D' => 0 , 'E' => 0 , ); 

         $objPHPExcel->getActiveSheet()->setCellValue('A12', $data[0]['grado'] );


        foreach($data as $r => $dataRow) {
            $row = $baseRow + $r;
            
            $letra = '';

            switch ($dataRow['literal']) {
              case 'A': $letra = 'K'; $contador['A']++; break;
              case 'B': $letra = 'L'; $contador['B']++; break;
              case 'C': $letra = 'M'; $contador['C']++; break;
              case 'D': $letra = 'N'; $contador['D']++; break;
              case 'E': $letra = 'O'; $contador['E']++; break;
           
            }

            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $dataRow['nombre'])
                                        ->setCellValue('F'.$row, Ayuda::formato_fecha(  $dataRow['edad']   ) )
                                        ->setCellValue('H'.$row, $dataRow['lugar'])
                                        ->setCellValue($letra.$row, 'X' )
                                        ->setCellValue('J'.$row, ($dataRow['sexo'] == 'm') ? 'V' : 'H'  )
                                        ->setCellValue('G'.$row,  $dataRow['EDAD2'][0].$dataRow['EDAD2'][1] );
        }

        $cantidad = count($data); 

        $objPHPExcel->getActiveSheet()->setCellValue('B54', Ayuda::promedio( $contador['A']  , $cantidad)  )
                                      ->setCellValue('C54', Ayuda::promedio( $contador['B']  , $cantidad)  )
                                      ->setCellValue('D54', Ayuda::promedio( $contador['C']  , $cantidad)  )
                                      ->setCellValue('E54', Ayuda::promedio( $contador['D']  , $cantidad)  )
                                      ->setCellValue('F54', Ayuda::promedio( $contador['E']  , $cantidad)  );

 
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

      // Redirect output to a client’s web browser (Excel5)
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="01simple.xls"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0


    $objWriter->save('php://output');
    exit;


    }


    // imprimir boletin 
   public function estudiantes($id){




    //llamar al generador de template 
    $templateWord = new TemplateProcessor('storage/estudiante.docx');

    // cargar datos
    $modelo = new \App\Models\Estudiantes();
    $estudiante = $modelo->consultarByID($id)[0]; 

    // nombre del archivo a generar
    $nombreDelArchivo = 'notas/'.$estudiante['nombre'];

    // variables 
   
    $fecha_lugar = $estudiante['lugar'].', '.Ayuda::formato_fecha($estudiante['edad']); 
           
     $templateWord->setValue('fecha_lugar', $fecha_lugar );
   


    foreach ($estudiante as $key => $value) {
        
      
         $templateWord->setValue($key, $value );


    }
     
    
    
    
    //$templateWord->setValue('lugar_fecha',$lugar_fecha);
 

    // --- Guardamos el documento
    $templateWord->saveAs('storage/'.$nombreDelArchivo.'.docx');

    header("Content-Disposition: attachment; filename=".$nombreDelArchivo.".docx; charset=iso-8859-1");
    echo file_get_contents('storage/'. $nombreDelArchivo.'.docx');
      	
  }

  
}
