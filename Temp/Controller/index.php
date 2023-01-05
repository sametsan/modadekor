<?php
namespace App\Controller;

use App\Model\Meta;
use App\Model\Categories;
use Core\View;
use App\Model\Records;

class index extends \Core\Controller{

    private static $name = "index";

    public static function link(){

        return "/";
    }

    public function __construct($args)
    { 
        $site_baslik = Meta::get("site_baslik");
        $site_tanim = Meta::get("site_tanim");

        View::render("1",["kategoriler"=>Categories::getAll(),"site_baslik"=>$site_baslik,"site_tanim"=>$site_tanim]);

        $son_eklenenler = Records::getAll("ORDER BY id DESC LIMIT 10 ");
        View::render("son_eklenenler",["son_eklenenler"=>$son_eklenenler]);

        $vitrin = Records::getAll("WHERE showroom='1' ");
        View::render("anasayfa",["vitrin"=>$vitrin,"vitrin_sutun"=>(int)Meta::get("vitrin_sutun"),"vitrin_satir"=>(int)Meta::get("vitrin_satir")]);


        View::render("2");
    }

};

?>