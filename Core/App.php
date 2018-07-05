<?php
namespace Core;
defined("PATH_RAIZ") OR die("Access denied");

class App
{
   
    private $_controller;

    private $_method;

    private $_params;

 
    const NAMESPACE_CONTROLLERS = "\App\Controllers\\";


    public function __construct()
    {
        //obtenemos la url parseada
        $url = $this->parseUrl();

        //comprobamos que exista el archivo en el directorio Controllers
        if(file_exists(PATH_CONTROLLERS.ucfirst($url[0]) . ".php"))
        {
            //nombre del archivo a llamar
            $this->_controller = ucfirst($url[0]);
            //eliminamos el controlador de url, así sólo nos quedaran los parámetros del método
            unset($url[0]);
        }
        else
        {
           
            $this->_controller = "Principal"; 
            $url[1] = "show";
        }

        //obtenemos la clase con su espacio de nombres
        $fullClass = self::NAMESPACE_CONTROLLERS.$this->_controller;

        //asociamos la instancia a $this->_controller
        $this->_controller = new $fullClass;

        //si existe el segundo segmento comprobamos que el método exista en esa clase
        if(  isset( $url[1]  ) )
        {

            try{
            
                if(method_exists($this->_controller, $url[1]))
                {
                   
                    //aquí tenemos el método
                    $this->_method = $url[1];

                    //eliminamos el método de url, así sólo nos quedaran los parámetros del método
                    unset($url[1]);
                }
            }catch(\Exception $e){
                
                      $url[1] = "get404";
            }
            






        }
        //asociamos el resto de segmentos a $this->_params para pasarlos al método llamado, por defecto será un array vacío
        $this->_params = $url ? array_values($url) : array();
    }

    /**
     * [parseUrl Parseamos la url en trozos]
     * @return [type] [description]
     */
    public function parseUrl()
    {
        if(isset($_GET["url"]))
        {
            return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        }
    }

    /**
     * [render  lanzamos el controlador/método que se ha llamado con los parámetros]
     */
    public function render()
    {
        call_user_func_array( array($this->_controller, $this->_method),  $this->_params);
    }

    /**
     * [getConfig Obtenemos la configuración de la app]
     * @return [Array] [Array con la Config]
     */
    public static function getConfig()
    {
        return parse_ini_file(PATH_APP . '/Config/Config.ini');
    }

    /**
     * [getController Devolvemos el controlador actual]
     * @return [type] [String]
     */
    public function getController()
    {
        return $this->_controller;
    }

    /**
     * [getMethod Devolvemos el método actual]
     * @return [type] [String]
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * [getParams description]
     * @return [type] [Array]
     */
    public function getParams()
    {
        return $this->_params;
    }
}
