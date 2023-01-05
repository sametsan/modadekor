<?php
namespace Core;


class View{

    public static function require($dosya){
        require_once self::fullPath($dosya);
    }

    public static function render($name,$args = []){
        
        extract($args, EXTR_SKIP);

        $file = VIEW_FULLPATH."/$name.php";

        if(file_exists($file))
            require_once   $file;
        else
            throw new \Exception(__FILE__." | $file dosyasi yok.");
    }



    public static function renderError($args = []){

        extract($args, EXTR_SKIP);

        $file = VIEW_FULLPATH."/hata.php";

        if(file_exists($file))
            require_once   $file;
        else
            throw new \Exception(__FILE__." | $file dosyasi yok.");
    }


    public static function url($dosya){
        return "http://".$_SERVER['HTTP_HOST']."/".VIEW_PATH.$dosya;
    }

    public static function fullPath($dosya){
        return VIEW_FULLPATH."/".$dosya;
    }

    public static function link($controller,$parameters){
        return Url::combine($controller,$parameters);
    }

};



?>