<?php
namespace App\Controllers;

defined("PATH_RAIZ") OR die("Access denied");


use \Core\View;

class Errors 
{   

   public function get404(){

       View::show("errors/404");
   }
}
