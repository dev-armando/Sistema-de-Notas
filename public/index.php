<?php
if(!isset($_SESSION)) {
    session_start();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// rutas de la APP 
define("PATH_RAIZ", dirname(__DIR__).'/' );

define("PATH_CORE", PATH_RAIZ.'Core/' );

define("PATH_PUBLIC", PATH_RAIZ.'Public/' );

define("PATH_APP", PATH_RAIZ.'App/' );

define("PATH_CONTROLLERS", PATH_APP.'Controllers/' );

define("PATH_MODELS", PATH_APP.'Models/' );

define("PATH_VIEWS", PATH_APP.'Views/' );



# uso de namespace para auto cargar las clases 

//autoload con namespaces
function autoload_classes($class_name)
{
    $filename = PATH_RAIZ. '/' . str_replace('\\', '/', $class_name) .'.php';
    if(is_file($filename))
    {
        include_once $filename;
    }
}
//registramos el autoload autoload_classes
spl_autoload_register('autoload_classes');

# lanzar la apliccion

//instancia de la app
$app = new \Core\App;

//lanzamos la app
$app->render();