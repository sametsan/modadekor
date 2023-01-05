<?
require_once "1.php";


echo "<h3>Mesajlar</h3>";




print "<div class=tablo>";
print "<div class=tablo-orta>";

echo "<div class=liste>";
$sql=$db->query("SELECT Distinct uye_no FROM mesajlar ORDER BY no DESC");
while($s=$sql->fetch_object()
{
$sqlm=$db->query("SELECT * FROM mesajlar WHERE  yonetim_ziyaret=0 AND uye_no='$s->uye_no'");
$mesaj=$db->num_rows($sqlm);

$sqlu=$db->query("SELECT * FROM uyeler WHERE no='$s->uye_no'");
$uye=$db->fetch_object($sqlu);

if($mesaj>0)
echo "<a class=secili href='mesaj.php?uye=$uye->no'>$uye->kullanici / $uye->ad $uye->soyad <span>[$mesaj]</span></a>";
else
echo "<a href='mesaj.php?&uye=$s->uye_no'>$uye->kullanici / $uye->ad $uye->soyad  <span>[$mesaj]</span></a>";


}
echo "</div>";
print "<div class=temizle></div>";
print "</div>";
print "<div class=temizle></div>";
print "</div>";

require_once "2.php";
?> 
