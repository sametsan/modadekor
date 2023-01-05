<?
require_once "bas.php";

$sql=$db->query("SELECT * FROM sepet WHERE uye='$session->UYE_no'");
$c=$db->num_rows($sql);

echo "Sepetinizde $c tane ürün var.<br>";
echo "<a href=sepetim.php>Satın Al</a> - ";
echo "<a href=# onclick=\"location='islem.php?islem=sepet_bosalt'\" >Sepetimi Boşalt</a><br><br>";


echo "<div class=sepet><table>";
echo "<tr>
<td>Ürün Adı </td>
<td width=15>Miktar</td>
<td width=15>Fiyat </td>
<td width=15>Sil </td>
</tr>";

while($d=$sql->fetch_object(){
$sqlf=$db->query("SELECT * FROM urunler WHERE no=$d->urun");
$f=$db->fetch_object($sqlf);

print "<tr>
<td> <a href=urun.php?no=$f->no>$f->ad</a></td>
<td>$d->adet</td>
<td>$f->fiyat TL</td>
<td><a href=islem.php?islem=sepet_kaldir&no=$d->no>Sil</a></td></tr>";
$toplam=$toplam+($f->fiyat*$d->adet);
}

print "<tr><td></td><td></td><td>Toplam :</td><td> $toplam TL</td></tr>";

echo "</table></div><br><br>";






?>
