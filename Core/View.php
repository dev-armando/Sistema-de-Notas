<?php
namespace Core;
defined("PATH_RAIZ") OR die("Access denied");

class View
{
    /**
     * @var
     */
    protected static $data;

    /**
     * @var
     */
    const VIEWS_PATH = "../App/Views/";
    
    const LAYOUTS_PATH = "../App/Views/layouts/";

    /**
     * @var
     */
    const EXTENSION_TEMPLATES = "php";

    /**
     * [render Views with data]
     * @param  [String]  [template name]
     * @return [html]    [render html]
     */
    public static function render($template)
    {

        $file = self::VIEWS_PATH . $template; 

        if(file_exists($file.'.php')) 
            $file .= '.php';
        
        else if(file_exists($file.'.html')) 
            $file .= '.html';
        
        else 
        {
             
            throw new \Exception("Error: El archivo " . self::VIEWS_PATH . $template  . " no existe", 1);
        }

   

        ob_start();
        
        if(is_array(self::$data))
            extract(self::$data);
       
        include($file);
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    }

  

    /**
     * [set Set Data form Views]
     * @param [string] $name  [key]
     * @param [mixed] $value [value]
     */
    public static function set($name, $value)
    {
        self::$data[$name] = $value;
    }

    public static function setData($data)
    {
        self::$data = $data;
    }
}
