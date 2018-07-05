<?php
namespace App\Controllers;
defined("PATH_RAIZ") OR die("Access denied");

use \Core\Controller,
    \Core\View,
    \App\Models\Cuentas as Modelo;

class Cuentas extends Controller
{   

    private static $cuentas; 

    public function __construct()
    {
        parent::__construct(__CLASS__);
        new Modelo;
    }
    
    public function principal()
    {
    
            $this->vista("principal");
        
    }



 

    public function ver_cuenta(){

         $this->vista("ver_cuenta");
       // View::show("cuentas/","ver_usuario"); 
    }


     public function generar_script(){

        $this->vista("generar_script" , "generar_script" );
        
    }
    
    public function editar_cuenta(){
        View::show("cuentas/editar_cuenta","editar_cuenta"); 

    }


    public function invitacion(){

    }

    public function nuevo_usuario(){

       if (isset($_POST['coordenadas'])){

           $id = Modelo::cifrado($_POST['usuario'] ,  $_POST['clave'][0] );

           $usuario = 

            $datos = array(
                "id"          => $id,
                "respuesta"   => Modelo::encrypt($_POST['clave'][2], $id),
                "clave"       => Modelo::encrypt($_POST['clave'][3], $id),
                "tarjeta"     => Modelo::encrypt($_POST['tarjeta'], $id),
                "coordenadas" => Modelo::encrypt( Modelo::str_coordenadas($_POST['coordenadas'] ) , $id  )

            );

            var_dump($datos);


    
          

            View::set("mensaje","Usuario Registrado Exitosamente");
            View::show("login/mensaje");


       }else {

             View::show("cuentas/nuevo_usuario","nuevo_usuario");

       }

       
        
    }


    public function test_post(){

        var_dump($_POST);
    }
}
