<?php
namespace Core;

class Helper{

    static $state;

    public static function seo($url)
    {
        $tr = array('Ç','Ğ','İ','Ö','Ş','Ü','ç','ğ','ı','ö','ş','ü','\'','_');
        $english = array('C','G','I','O','S','U','c','g','i','o','s','u','-','-');

        $string = strip_tags($url);
        
        $string = str_replace($tr, $english, $url);
        $string = preg_replace("`\[.*\]`U","",$url);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$url);
        $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $url );
        $string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $url);
        $string = htmlentities($url, ENT_COMPAT, 'utf-8');
        return strtolower(trim($url, '-'));
    }

};


?>