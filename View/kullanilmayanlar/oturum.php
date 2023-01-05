
<?



if(giris()){


echo "<div class=giris-sutun>";

$sqlm=$db->query("SELECT * FROM mesajlar WHERE uye_no=$session->UYE_no AND uye_ziyaret=0");
$mesaj=$db->num_rows($sqlm);

$sqlq=$db->query("SELECT * FROM mesajlar WHERE  yonetim_ziyaret=0 ");
$yonetim_mesaj=$db->num_rows($sqlq);

$sqlb=$db->query("SELECT * FROM siparisler WHERE  durum=0 ");
$yonetim_siparisler=$db->num_rows($sqlb);


$sql=$db->query("SELECT * FROM uyeler WHERE no='$session->UYE_no'");
$s=$sql->fetch_object(;

$sepet_sql=$db->query("SELECT * FROM sepet WHERE uye='$session->UYE_no'");
$sepet=$db->num_rows($sepet_sql);



$dugme="$s->ad $s->soyad";

print "<h3>$s->ad $s->soyad</h3> <br> ";

echo "<a href=profil.php>Profilim</a><br>";
if(yonetim())
print "

<a href=yonetim/>Yönetim</a><br>
<a href=yonetim/mesajlar.php>Yönetim Mesajlar[$yonetim_mesaj]</a>  <br>
<a href=yonetim/siparisler.php>Yönetim Siparişler[$yonetim_siparisler]</a> <br>
";

echo "
<a href=sepetim.php>Sepetim[$sepet]</a><br>
<a href=siparisler.php>Siparişlerim</a> <br>
<a href=mesajlarim.php>Mesajlarım[$mesaj]</a> <br>
";

echo "
<a href=islem.php?islem=uye_cikis class=giris2-cikis></a>
";

echo "</div>";


echo "<div class=giris-sutun>";
print "<h3>Yöneticiye Mesaj Gönder</h3> <br> ";
include "mesajlarim.php";
echo "</div>";

echo "<div class=giris-sutun>";
print "<h3>Sepetim</h3> <br> ";
include "eklenti/sepet.php";


echo "</div>";
}


?>