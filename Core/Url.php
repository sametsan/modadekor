<?
namespace Core;


class Url{

    public static $params=[];
    public static $controller;

    public static function go($controller,$parameters){
       return self::combine($controller,$parameters);
    }


    public static function run(){

        $string = $_SERVER["QUERY_STRING"];
        
        $parametre = explode(URL_SEPERATOR,trim($string));

        self::$controller = $parametre[0];

        unset($parametre[0]);
        $parametre = array_values($parametre);
       
        self::$params = $parametre;
    }


    public static function combine($controller,$parameters){
        $ret = "$controller";

        foreach($parameters as $param){
            $ret .= URL_SEPERATOR."$param";
        }

        return $ret;

    }


};




?>