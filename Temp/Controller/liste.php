<?php
namespace App\Controller;

use App\Model\ayarlar;
use App\Model\Categories;
use Core\View;
use App\Model\Meta;
use App\Model\kategoriler;
use App\Model\Records;
use Core\Url;

class liste extends \Core\Controller{

    private static $name = "liste";


    public static function link($m_kategori,$m_sayfa=0)
    {
        if($m_sayfa>0)
            return Url::combine(self::$name,[$m_kategori,$m_sayfa]);
        else
            return Url::combine(self::$name,[$m_kategori]);
    }

    public function __construct($args)
    { 
        $kategori = $args[0];

        if(count($args) == 2)
            $sayfa =intval($args[1]);
        else
            $sayfa = 1;

        $site_baslik = Meta::get("site_baslik");
        $site_tanim = Meta::get("site_tanim");

        View::render("1",["kategoriler"=>Categories::getAll(),"site_baslik"=>$site_baslik,"site_tanim"=>$site_tanim]);

       // View::render("slayt",["slayt"=>""]);

        $sutun = (int)Meta::get("vitrin_sutun");
        $vitrin_satir = (int)Meta::get("vitrin_satir");
        $limit =  $sutun * $vitrin_satir;
        $start = ($sayfa-1) * $limit;

        $urun_liste = Records::getAll("WHERE kid='$kategori'  ORDER BY id DESC LIMIT $start,$limit ");
        $sayfa_sayisi = count($urun_liste)/$limit;
 
        View::render("liste",["sayfa"=>$sayfa,"vitrin_sutun"=>$sutun,"vitrin_satir"=>$vitrin_satir,"urunler"=>$urun_liste,"sayfa_sayisi"=>$sayfa_sayisi]);

 /*  
     View::render("anasayfa");;*/
        View::render("2");


    }

};


?>