<?
require_once "1.php";

switch($get->islem)
{
case "ekle":

$sqlt=$db->query("INSERT INTO taksitler (urun,sayfa,adres)
VALUES ('$get->no','$post->sayfa','$post->adres')");

if(!$sqlt) print $db->error();
header("location:?no=$get->no");

break;


case "sil":
$db->query("DELETE FROM taksitler WHERE no=$get->no");

header("location:?no=$get->urun");
print "İşlem tamamdır...<a href=urunler.php>Geri</a>";
break;

}


if($get->no){
$sql_urun=$db->query("SELECT * FROM urunler WHERE no=$get->no");
$urun=$db->fetch_object($sql_urun);
echo "<h3><a href=urun.php?no=$get->no>$urun->ad</a> | <a href=urun.php?islem=sil&no=$get->no>Ürünü Sil</a> | <a href=resim_yukle.php?no=$get->no>Resim Yükle</a> | <a href=taksit.php?no=$get->no>Taksit Ekle</a></h3>";
}



print "<table border=0 width=90%>";
print "<tr><td>Sayfa Adı </td><td>Adres</td><td>Sil</td></tr>";


$sqlk=$db->query("SELECT * FROM taksitler WHERE urun='$get->no'");
while($c=$db->fetch_object($sqlk)){

print "<tr><td>$c->sayfa </td><td>$c->adres</td><td><a href=?islem=sil&no=$c->no&urun=$get->no>Sil</a></td></tr>";
}
print "</table>";


print "<form action=?islem=ekle&no=$get->no method=post>";
print "<table border=0 width=90%>";
print "<tr><td>Sayfa Adı </td><td>Adres</td></tr>";

print "<tr><td><input type=text name=sayfa > </td><td><input type=text name=adres ></td></tr>";



print "<tr><td> </td><td><input type=submit value=Kaydet></td></tr>";
print "</table>";
print "</form>";
require_once "2.php";
?> 
