<?php
namespace Core;
defined("PATH_RAIZ") OR die("Access denied");

class Helpers
{
    
  

    public static function sanatize_edad($fecha)
    {

        $meses = array ( 'Jan' => '01' , 'Feb' => '02' , 'Mar' => '03' , 'Apr' => '04' , 
                         'May' => '05' ,  'Jun' => '06' ,  'Jul' => '07' , 
                         'Aug' => '08' , 'Sep' => '09' , 'Oct' => '10' , 'Nov' => '11' , 
                          'Dec' => '12');

        $m = $fecha[0].$fecha[1].$fecha[2]."";
        
        $dia = $fecha[4].$fecha[5]."";

        $year = $fecha[8].$fecha[9].$fecha[10].$fecha[11]."";

        return $year.$meses[$m].$dia;

    }

     public static function formato_fecha($fecha)
    {


        $year = $fecha[0].$fecha[1].$fecha[2].$fecha[3];
        $mes =  $fecha[5].$fecha[6];
        $day =  $fecha[8].$fecha[9];

        return $day.'/'.$mes.'/'.$year;

    }


    public static function promedio( $cantidad , $total  ){

      return ($cantidad / $total) ;
    }


}
