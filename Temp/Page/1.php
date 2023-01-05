
<?
print "<title>$site_baslik</title>";
echo "<meta name=description content='$site_tanim'>";

self::require("tema.php");

?>

<center>
<div class=ana>

<div class=baslik>
<div class=baslik_logo>
    <a href=.><img border=0 src=<?=self::url("tema/baslik.png")?>></a>
</div>

<div class=baslik_menu>

    <div class=uyelik_menu>

    <?php

/*

    if(Controller::isSessionAdmin())
        print "<a href=yonetim>Yönetim</a> | ";

    if(Controller::isSessionUser())
    {
        print "<a href=giris>Giriş</a> | ";
        print "<a href=uyeol>Üye Ol</a>";
    } else {
        print "<a href=profil>Profilim</a> | ";
        print "<a href=islem-uye_cikis>Çıkış</a>";
    }

*/
    ?>
    
    
    </div>

    <div class=site_menu>
        <a href=.>Anasayfa</a> |
        <a href=hakkimizda>Hakkımızda</a> |
        <a href=iletisim>İletişim</a>


    </div>


</div>

</div>

<div class=menu>

<?php

foreach($kategoriler as $kategori){

    if($kategori->kid == 0){
        $link = App\Controller\liste::link($kategori->id);

        echo "<div class=dugme onmouseover=\"menu('liste_$kategori->id',1)\" onmouseout=\"menu('liste_$kategori->id',0)\" >
        <a href=$link>$kategori->name</a>";


        echo "<div class=kategoriler id=liste_$kategori->id>";
        foreach($kategoriler as $alt_kategori){
            if($alt_kategori->kid == $kategori->id)
            echo "<a href=liste-$alt_kategori->id>$alt_kategori->name</a>";
        }

        echo "</div>";
        echo "</div>";
    }

 }

?>

 </div>
<div class=orta>

