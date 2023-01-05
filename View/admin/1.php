<?
require_once "bas.php";
?>
<link href="tema/css.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<script src=../tema/eyceks/eyceks.js></script>
<script src=js.js></script>

<?

if(!yonetim())
header("location:../giris.php");

echo "  <script type=text/javascript src=../tema/editor.js></script> <script type=text/javascript>
    //<![CDATA[
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    //]]>
    </script>";



echo "<div class=baslik>
<a href=../>".ayar_al("site_baslik")."</a>
</div>";

print "<div class=menu>
<a class=menu-dugme href=index.php>Anasayfa</a>
<a class=menu-dugme  href=siparisler.php>Siparişler</a>
<a class=menu-dugme  href=kategoriler.php>Ürünler</a>
<a class=menu-dugme  href=uyeler.php>Üyeler</a>
<a class=menu-dugme  href=mesajlar.php?sira=yeni>Mesajlar</a>
<a class=menu-dugme  href=slayt.php>Slayt</a>
<a class=menu-dugme  href=alt.php>Alt</a>
<a class=menu-dugme  href=sozlesme.php>Satış Sözleşmesi</a>
<a class=menu-dugme  href=aktif.php>Aktif Olanlar</a>
<a class=menu-dugme  href=duyuru.php>Duyuru</a>
<a class=menu-dugme  href=odemeler.php>Ödemeler</a>
<a class=menu-dugme  href=ayarlar.php>Ayarlar</a>
</div><br>";
echo "<div class=ana>";
echo"<div class=orta>";

?> 
