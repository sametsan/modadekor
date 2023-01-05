<?
tema_tablo_ac();


echo "<img src=tema/veriler.png>";
$sql=$db->query("SELECT * FROM urunler");
$s=$db->num_rows($sql);
print "Ürün Sayısı : <b>$s</b> <br>";
print "Şu anda aktif misafir : <b> ".online_misafir()."</b> kişi<br>";
print "Şu anda aktif üye : <b> ".online_uye()."</b> kişi";
tema_tablo_kapat();
?>