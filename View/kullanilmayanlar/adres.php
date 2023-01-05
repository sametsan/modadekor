
<?
echo "<div class=adres>";


echo "<a href=index.php>Anasayfa</a> / "; 


if($get->kno){
$sqlk=$db->query("SELECT * FROM kategoriler WHERE no='$ak->kno'");
$k=$db->fetch_object($sqlk);
print "$k->kategori";}
elseif($get->ara)
print "$get->ara sonuçları";


switch(basename($server->SCRIPT_FILENAME)){
case "hakkimizda.php":print "Hakkımızda";break;
case "iletisim.php":print "İletişim";break;
case "profil.php":print "Profil";break;
case "sepetim.php":print "Sepetim";break;
case "siparisler.php":print "Siparişlerim";break;
case "mesajlarim.php":print "Mesajlarım";break;

case "urun.php":
$sql=$db->query("SELECT * FROM urunler WHERE no=$get->no");
$s=$sql->fetch_object(;
$sqlak=$db->query("SELECT * FROM kategoriler WHERE no='$s->kno'");
$ak=$db->fetch_object($sqlak);
echo " <a href=liste.php>Ürünler</a> / <a href=liste.php?kno=$s->kno>$ak->kategori </a> / $s->ad";
break;

case "liste.php":
if($get->kno){
$sqlk=$db->query("SELECT * FROM kategoriler WHERE no='$get->kno'");
$k=$db->fetch_object($sqlk);
print "<a href=liste.php>Ürünler</a> / $k->kategori ";
}
else
print "Ürünler";
break;


}

echo "</div>";
?>