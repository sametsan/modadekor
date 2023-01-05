<?php
namespace App\Controller;

use App\Model\Meta;
use Core\View;
use App\Model\Records;
use App\Model\Categories;
use Core\Url;
use App\Model\Session;

class admin extends \Core\Controller{

    private static $name = "admin";


    public static function link($sayfa)
    {
            return Url::combine(self::$name,[$sayfa]);
    }

    public function __construct($args)
    { 
        if(count($args))
            $sayfa = (int)$args[0];

        $kategoriler =new Categories();
        $ayarlar = new Meta();
        $urunler = new Records();
        $session = new Session();
            
        if(!$session->isAdmin())
            $sayfa = "giris";
        

        $site_baslik = $ayarlar->get("site_baslik");
        $site_tanim = $ayarlar->get("site_tanim");

        View::render("1",["kategoriler"=>$kategoriler->getAll(),"site_baslik"=>$site_baslik,"site_tanim"=>$site_tanim]);
   
        switch($sayfa){

            case "login": 


                View::render("admin/$sayfa");
            break;




            default:

                View::render("admin/$sayfa");
            break;


        }


        View::render("2");


    }

};


?>