<?php
namespace Core;


class Router extends \Core\Url{

    static $sayfa;
    static $parametre=[];
    static $anasayfa;

    public static function run(){

        Url::run();

        if(!empty(Url::$controller)){
            View::render(Url::$controller);
        }else
            View::render(MAIN_CONTROLLER);

        

/*
        if(empty($url["controller"]))
            $controller_name = "\\App\\Controller\\".MAIN_CONTROLLER;
        else
            $controller_name = "\\App\\Controller\\".$url["controller"];

        if(class_exists($controller_name)){
           throw new $controller_name($url["parameters"]);
        }
        else
            throw new \Exception(__FILE__." $controller_name Controller bulunamadı");
*/
    }

}
