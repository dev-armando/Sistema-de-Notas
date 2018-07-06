<?php
namespace App\Controllers;


use \Core\Controller,
    \Core\View, 
     \App\Models\User;

defined("PATH_RAIZ") OR die("Access denied");
// Controlador para Hacer Pruebas 
class Test extends Controller
{

	public function __construct(){

        parent::__construct(__CLASS__);
    }


    public function post()
    {        
        
        View::render('Test/post');
        
    }



  
}
