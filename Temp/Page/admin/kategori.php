<?
require_once "1.php";
require_once "galeri.php";


switch($get->islem){

case "sil":

        $sql=$db->query("SELECT * FROM kategoriler WHERE no='$get->no'");
        $s=$sql->fetch_object(;

        if(galeri_sil($s->resim_no)){
                $db->query("DELETE FROM kategoriler WHERE no='$get->no'");
                header("location:?kategori_uyari=1");
        }
                header("location:?kategori_uyari=3");

break;

case "duzenle":

        $dizin="../resimler/kategoriler/";
        $resim_no=galeri_yukle($dizin,$_FILES["resim"]["tmp_name"]);
  
        $db->query("UPDATE kategoriler SET kategori='$post->ad' WHERE no='$post->no'");
        $db->query("UPDATE kategoriler SET kno='$post->kategori' WHERE no='$post->no'");

        if($resim_no > 0){        
                $db->query("UPDATE kategoriler SET resim_no='$resim_no' WHERE no='$post->no'");
        }

        header("location:?kategori_uyari=1&no=$post->no");

break;

case "ekle":

        $dizin="../resimler/kategoriler/";
        $resim_no=galeri_yukle($dizin,$_FILES["resim"]["tmp_name"]);

        print($resim_no."<br>");
        $db->query("INSERT INTO kategoriler (kategori,kno,resim_no,sira) VALUES ('$post->ad','$post->kategori','$resim_no',0)")or die($db->error());

        header("location:?kategori_uyari=1");
break;

}



switch($get->kategori_uyari){
case 1 : print "İşlem tamamdır.";break;
case 2: print "Resim yüklenemedi.";break;
case 3: print "Boşlukları doldurun.";break;
}





if($get->no)
{
$islem="duzenle";
$sql=$db->query("SELECT * FROM kategoriler WHERE no='$get->no'");
$s=$sql->fetch_object(;
$sql_r=$db->query("SELECT * FROM galeri WHERE no='$s->resim_no'");
$r=$db->fetch_object($sql_r);

echo "<a href=?islem=sil&no=$get->no>Kategoriyi Sil</a><hr>";
}
else
$islem="ekle";

echo "<form action=?islem=$islem method=post method=post enctype=multipart/form-data>";

echo "<div class=tablo>";
echo "<table width=100%>";
echo "<input type=hidden name=no value=\"$get->no\">";

echo "<tr><td>Kategori Adı</td><td><input type=text name=ad value=\"$s->kategori\"></td></tr>";

echo "<tr><td>Kategori</td><td>";

$sqld=$db->query("SELECT * FROM kategoriler WHERE kno=0 ORDER BY sira");
if($sqld==TRUE){
echo "<select name=kategori>";
echo "<option value=0>|----|Kategori|----|</option>";
while($d=$db->fetch_object($sqld))
if($s->kno==$d->no)
echo "<option value=$d->no selected=selected>$d->kategori</option>";
else
echo "<option value=$d->no>$d->kategori</option>";
echo "</select>";
}
echo "</td></tr>";
echo "<tr><td>Resim  <br><img width=45 height=35 src=$r->adres> </td><td><input type=file name=resim></td></tr>";
echo "<tr><td></td><td><input type=submit  value=\"Kaydet\"></td></tr>";
echo "</table>";
echo "</div>";
echo "</form>";
require_once "2.php";

?> 
