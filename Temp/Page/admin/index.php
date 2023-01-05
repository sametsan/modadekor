<?
require_once "1.php";

echo "<div class=tablo style=\"width:350;float:left;\">";
echo "<div class=tablo-orta>";
echo "<h3>Stokta azalanlar(2'den az)</h3>";
$sql=$db->query("SELECT * FROM urunler WHERE adet<2");
while($s=$sql->fetch_object()
echo "<li><a href=urun.php?no=$s->no>$s->ad</a>[$s->adet]</li>";
echo "</div>";
echo "</div>";


echo "<div class=tablo style=\"width:350;float:left;\">";
echo "<div class=tablo-orta>";
echo "<h3>Beğenilenler</h3>";
$sql=$db->query("SELECT * FROM urunler ORDER BY begen DESC LIMIT 10");
while($s=$sql->fetch_object()
echo "<li><a href=urun.php?no=$s->no>$s->ad</a>[$s->begen]</li>";

echo "<h3>Aktif Olanlar</h3>";
$sql=$db->query("SELECT * FROM online");
while($s=$sql->fetch_object(){
$sqlu=$db->query("SELECT * FROM uyeler WHERE no=$s->ad");
$uye=$db->fetch_object($sqlu);
echo "<li>$uye->ad $uye->soyad / $s->ip / $d->sayfa </li>";
}
echo "<br><a href=aktif.php>Tümünü gör</a>";
echo "</div>";
echo "</div>";


echo "<div class=tablo style=\"width:300;float:left;\">";
echo "<div class=tablo-orta>";
echo "<h3>Son Üyeler</h3>";
$sql=$db->query("SELECT * FROM uyeler ORDER BY no DESC LIMIT 20");
while($s=$sql->fetch_object()
echo "<li><a href=uye.php?no=$s->no>$s->ad $s->soyad</a></li>";

echo "<h3>Veriler</h3>";
$sql=$db->query("SELECT * FROM urunler");
$s=$db->num_rows($sql);
print "Ürün Sayısı : <b>$s</b> <br>";

$sql=$db->query("SELECT * FROM uyeler");
$s=$db->num_rows($sql);
print "Üye Sayısı : <b>$s</b> <br>";
echo "</div>";
echo "</div>";

require_once "2.php";
?> 
