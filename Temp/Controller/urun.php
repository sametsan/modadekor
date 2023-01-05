<?php
namespace App\Controller;

use App\Model\Meta;
use App\Model\Categories;
use App\Model\Records;
use Core\View;
use Core\Url;

class urun extends \Core\Controller{

    private static $name = "urun";


    public static function link($no)
    {
            return Url::combine(self::$name,[$no]);
    }

    public function __construct($args)
    { 
        $urun_no = (int)$args[0];
        
        
        $site_baslik = Meta::get("site_baslik");
        $site_tanim = Meta::get("site_tanim");

        View::render("1",["kategoriler"=>Categories::getAll(),"site_baslik"=>$site_baslik,"site_tanim"=>$site_tanim]);
      
       // View::render("slayt",["slayt"=>""]);


        $urun = Records::get($urun_no);
        View::render("urun",["urun"=>$urun]);
        
 /*    
        View::render("liste",["sayfa"=>$sayfa,"sutun"=>$sutun,"urunler"=>$urun_liste,"count"=>count($urun_liste)]);


     View::render("anasayfa");;*/
        View::render("2");


    }

};


?>