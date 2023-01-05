<?
require_once "1.php";
require_once "ftp.php";
require_once "galeri.php";

print "<center>";

if($get->islem=="yukle")
{

    $dizin="../resimler/$get->no/";
    $result  = galeri_yukle($dizin,$_FILES["dosya"]["tmp_name"]);

    if($result){
        echo "İşlem tamam.";
        header("location:?no=$get->no&uyari=1");
    }else{
        echo " İşlem başarısız.$d<br>".$_FILES['dosya']['error'];
    }

}



if($get->islem=="sil")
{
unlink($get->ad);
header("location:?no=$get->no&uyari=1");
}

if($get->islem=="kapak")
{
$db->query("UPDATE urunler SET resim='$get->ad' WHERE no='$get->no'");
header("location:?no=$get->no&uyari=1");
}


if($get->no){
$sql_urun=$db->query("SELECT * FROM urunler WHERE no=$get->no");
$urun=$db->fetch_object($sql_urun);
echo "<h3><a href=urun.php?no=$get->no>$urun->ad</a> | <a href=urun.php?islem=sil&no=$get->no>Ürünü Sil</a> | <a href=resim_yukle.php?no=$get->no>Resim Yükle</a> | <a href=taksit.php?no=$get->no>Taksit Ekle</a></h3>";
}

if($get->uyari==1)
print "İşlem tamamdır.<br>";
print "
<form action=?no=$get->no&islem=yukle  method=post enctype=multipart/form-data>
<input type=file name=dosya>
<input type=submit value=yükle>
</form><br><br>";

print "<h3>Ürün kapağı</h3>";
echo "<img width=200 src='../".urun_resim($get->no)."'>";

print "<h3>Diğer resimler </h3><br>";

$dizin="../resimler/$get->no/";
$d=opendir($dizin);
if($d)
while($s=readdir($d))
{
if($s!=".." && $s!="." && $s!="kapak")
print "<div style='float:left;padding:2;height:200;border:1px solid #EFEFEF;'><img width=150 src=$dizin/$s><br><a href=?islem=sil&ad=$dizin/$s&no=$get->no>Sil</a> | <a href=?islem=kapak&ad=$s&no=$get->no>Kapak</a></div>";
}
require_once "2.php";
?> 
