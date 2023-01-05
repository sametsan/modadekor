<?
require_once "1.php";

switch($get->islem){
case "duzenle":
foreach($post->sira as $s=>$d)
$db->query("UPDATE kategoriler SET sira='$d' WHERE no=$s");


 header("location:?kategori_uyari=1");
break;
}



switch($get->kategori_uyari){
case 1 : print "İşlem tamamdır.";break;
case 2 : print "Boşlukları doldurun.";break;
}
echo "<hr>";

$sqld=$db->query("SELECT * FROM kategoriler WHERE no='$get->no' ORDER BY sira");
$d=$db->fetch_object($sqld);

echo $d->kategori;

if($get->no)
echo " / <a href=kategori.php?kno=$get->no>Kategori Ekle</a><hr>";
else
echo " / <a href=kategori.php>Kategori Ekle</a><hr>";


print "<form action=?islem=duzenle method=post>";


print "<div class=liste ><table width=100%>";
// // // // // // // // // // // // // // // // // // // // // // // // // // // 



$sql=$db->query("SELECT * FROM kategoriler  ORDER BY sira");
while($s=$sql->fetch_object()
{
print "<tr>";

echo "<td><a href=urunler.php?no=$s->no>$s->kategori</a></td>";

echo "<td width=100><a href=kategori.php?no=$s->no>Düzenle</a></td>";
echo "<td width=50> <input style=\"float:right\" type=text value='$s->sira' name=sira[$s->no] size=3></td>";
echo "</tr>";
}




echo "</table></div>";

print "<input type=submit value=Kaydet>";
print "</form><br>";

require_once "2.php";

?> 
