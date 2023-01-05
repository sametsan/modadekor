<?
require_once "1.php";

switch($get->sayfa)
{
case "temizle":
$db->query("DELETE FROM siparisler WHERE durum='4'");
header("location:?uyari=1&durum=4");
break;

case "iptal":
$db->query("UPDATE siparisler SET durum=5 WHERE no='$get->no'");
header("location:?uyari=1&durum=5");
break;
case "sil":
$db->query("DELETE FROM siparisler WHERE no='$get->no'");
header("location:?uyari=1&durum=5");
break;
case "duzenle":

foreach($post->siparis as $siparis)
{
$durum=$post->durum[$siparis];
$db->query("UPDATE siparisler SET durum='$durum' WHERE no='$siparis'");

$aciklama=trim($post->aciklama);

echo $_POST["aciklama"];

if($aciklama!="<br>")
$db->query("UPDATE siparisler SET aciklama='$aciklama' WHERE no='$siparis'")or die($db->error());
if($post->kargo_tarih)
$db->query("UPDATE siparisler SET kargo_tarih='$post->kargo_tarih' WHERE no='$siparis'");
if($post->kargo_saat)
$db->query("UPDATE siparisler SET kargo_saat='$post->kargo_saat' WHERE no='$siparis'");
if($post->kargo_no)
$db->query("UPDATE siparisler SET kargo_no='$post->kargo_no' WHERE no='$siparis'");
if($post->kargo_sirket)
$db->query("UPDATE siparisler SET kargo_sirket='$post->kargo_sirket' WHERE no='$siparis'");
if($post->kargo_site)
$db->query("UPDATE siparisler SET kargo_site='$post->kargo_site' WHERE no='$siparis'");

}

 header("location:?uyari=1&durum=$durum");
break;
}


switch($get->uyari){
case 1 : echo "<div class=uyari>İşlem tamamdır.</div><br>";break;
}

$durum=$get->durum;

if($durum==0)
$durum='';

echo "<div class=siparisler-menu>";
$i=0;
foreach($siparis_durum as $sip_durum){
if($durum!=$i)
echo "<a href=?durum=$i>".$sip_durum[1]."</a> - ";
else
echo $sip_durum[1]." - ";
$i=$i+1;
}
echo "</div><br>";

if($get->durum==4){
echo "<div class=siparisler-menu>";
echo "<a  href=siparis_yedekle.php>Teslim listesini indir</a> - ";
echo "<a  href=?sayfa=temizle>Temizle</a>";
echo "</div>";}




$sql=$db->query("SELECT DISTINCT uye_no FROM siparisler WHERE durum='$durum' ORDER BY no DESC");

while($s=$sql->fetch_object()
{


echo "<form action=?sayfa=duzenle method=post>";

$sqlu=$db->query("SELECT * FROM uyeler WHERE no=$s->uye_no");
$uye=$db->fetch_object($sqlu);

echo "<div class=tablo>";
echo "<div class=tablo-orta>";


$sqlf=$db->query("SELECT * FROM siparisler WHERE durum='$durum' AND uye_no='$s->uye_no' ORDER BY no DESC");

echo "<table width=100% border=1 cellpadding=5 cellspacing=0>";

echo "<tr>
<td width=5><span id=siparis_dugme_$uye->no style=\"cursor:pointer;\"><a  onclick=\"uye_siparis_goster($uye->no)\">A</a></span></td>

<td  width=100><a target=asasdasdas href=uye.php?no=$uye->no>$uye->ad $uye->soyad </a></td>
<td > $uye->adres </td>
<td width=100>$uye->ilce-$uye->il </td>
<td width=100> $uye->telefon </td>
<td  width=200> $uye->eposta</td></tr>";
echo "</table>";

echo "<div id=siparisler_$uye->no class=uye_siparisler>";

while($siparisler=$db->fetch_object($sqlf)){
$sqls=$db->query("SELECT * FROM urunler WHERE no=$siparisler->urun");
$urun=$db->fetch_object($sqls);


echo "<table width=100% border=1 cellpadding=5 cellspacing=0>";
echo "<tr>";
echo "<td width=10><input type=checkbox name=siparis[$siparisler->no] value=$siparisler->no></td>";
if($durum==5)
echo "<td width=10><a title=Sil onclick='siparis_sil($siparisler->no)'><img src=tema/sil.jpg></a></td>";
else{echo "<td><select name=durum[$siparisler->no]>";
$i=0;
foreach($siparis_durum as $sip_durum){
if($durum!=$i)
echo "<option value='$i'>".$sip_durum[1]."</option>";
else
echo "<option value='$i' selected>".$sip_durum[1]."</option>";
$i=$i+1;
}
echo "</select></td>";
}
echo "<td ><a target=asdas href=../urun.php?no=$urun->no>$urun->ad</a></td>";
echo "<td width=150>$siparisler->tarih / $siparisler->saat</td>";
echo "<td width=100>$urun->fiyat TL X $siparisler->adet</td>";
echo "<td width=70>&nbsp;$siparisler->kargo_no</td>";
echo "<td width=70>&nbsp;$siparisler->kargo_sirket</td>";
echo "<td width=70>&nbsp;$siparisler->kargo_tarih</td>";
echo "<td width=70>&nbsp;$siparisler->kargo_saat</td>";
echo "<td width=70>&nbsp;$siparisler->kargo_site</td>";
echo "<td width=70>$siparisler->aciklama</td>";
echo "</tr>";

$odeme=$siparisler->odeme;
$toplam_fiyat_ara=$toplam_fiyat_ara+($urun->fiyat*$siparisler->adet);
$toplam_adet=$toplam_adet+$siparisler->adet;


}


$sqlo=$db->query("SELECT * FROM odemeler WHERE no='$odeme'");
$odeme=$db->fetch_object($sqlo);

$kargo_fiyat=$odeme->fiyat;


$toplam_fiyat=$toplam_fiyat_ara+$kargo_fiyat;
echo "<tr>";
echo "<td width=10></td>";
echo "<td colspan=2>Toplam Ürün Adeti : $toplam_adet</td>";
echo "<td width=150>Ara Toplam : </td>";
echo "<td width=100>$toplam_fiyat_ara TL</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=10></td>";
echo "<td  colspan=2>Ödeme Şekli : $odeme->ad</td>";
echo "<td width=150>Kargo Ücreti : </td>";
echo "<td width=100>$kargo_fiyat</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=10></td>";
echo "<td colspan=2 ></td>";
echo "<td width=150>Genel Toplam : </td>";
echo "<td width=100>$toplam_fiyat</td>";
echo "</tr>";

$toplam_fiyat=0;
$toplam_adet=0;
echo "</table>";


if($get->durum!=4 && $get->durum!=5){
echo "<table width=100% border=0 cellpadding=5 cellspacing=0>";
echo "<tr>";
echo "<td>Kargo Tarih : </td><td><input type=text name=kargo_tarih  size=8> </td>";
echo "<td rowspan=4 ><textarea name=aciklama cols=65 rows=3></textarea></td>
</tr>";
echo "<tr><td> Kargo Saat : </td><td><input type=text name=kargo_saat  size=8> </td></tr>";
echo "<tr><td>Kargo şirket : </td><td><input type=text name=kargo_sirket  size=8> </td></tr>";
echo "<tr><td>Kargo no : </td><td ><input type=text name=kargo_no  size=13> </td></tr>";
echo "<tr><td>Kargo şirket : </td><td><input type=text name=kargo_sirket  size=8> </td></tr>";
echo "<tr><td>Kargo Takip : </td><td ><input type=text name=kargo_site  size=13> </td></tr>";

echo "</table>";

}

echo "<input type=submit value=Tamam>";
echo "</div>";
echo "</div><br>";


$toplam_adet=0;
$toplam_fiyat=0;
$toplam_fiyat_ara=0;
$kargo_fiyat=0;
echo "</form></div>";
}



require_once "2.php";
?> 
