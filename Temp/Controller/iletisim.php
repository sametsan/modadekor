<?php
namespace App\Controller;

use App\Model\Meta;
use App\Model\Categories;
use Core\View;
use Core\Url;

class iletisim extends \Core\Controller{

    private static $name = "iletisim";


    public static function link($m_kategori,$m_sayfa=0)
    {
        if($m_sayfa>0)
            return Url::combine(self::$name,[$m_kategori,$m_sayfa]);
        else
            return Url::combine(self::$name,[$m_kategori]);
    }

    public function __construct($args)
    { 

        $site_baslik = Meta::get("site_baslik");
        $site_tanim = Meta::get("site_tanim");

        View::render("1",["kategoriler"=>Categories::getAll(),"site_baslik"=>"İletişim","site_tanim"=>$site_tanim]);

        /////////////////////////////////////////////////////////////

  
        View::render("iletisim",["iletisim"=>Meta::get("iletisim")]);


        View::render("2");


    }

};


?>