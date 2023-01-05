<?php
namespace Core;


class Storage{


    public static function upload($name,$args = []){

    }


    public static function url($dosya){
        return "http://".$_SERVER['HTTP_HOST']."/".APP_STORAGE_PATH.$dosya;
    }

    public static function fullPath($dosya){
        return APP_STORAGE_FULLPATH."/".$dosya;
    }

};



?>