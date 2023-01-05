<?php
namespace App\Controller;

use App\Model\ayarlar;
use Core\View;
use App\Model\kategoriler;
use Core\Url;

class hata extends \Core\Controller{

    private static $name = "hata";


    public static function link($m_kategori,$m_sayfa=0)
    {
        if($m_sayfa>0)
            return Url::combine(self::$name,[$m_kategori,$m_sayfa]);
        else
            return Url::combine(self::$name,[$m_kategori]);
    }

    public function __construct($args)
    { 

        $liste = (new kategoriler())->hepsiniAl();
        $ayarlar = new ayarlar();

        $site_baslik = $ayarlar->al("site_baslik");
        $site_tanim = $ayarlar->al("site_tanim");

        View::render("1",["kategoriler"=>$liste,"site_baslik"=>"Hata ".$args["header"],"site_tanim"=>$args["header"]]);

        /////////////////////////////////////////////////////////////

  
        View::render("hata",$args);


        View::render("2");


    }

};


?>