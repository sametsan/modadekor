<?
require_once "1.php";
require_once "ftp.php";
print "<center>";

if($get->islem=="yukle")
{

$dizin="../resimler/slayt/";

$tip=explode("/",$_FILES["dosya"]["type"]);
$uzanti=$tip[1];

$ad=date("ymdHis").".$uzanti";
$adres = $dizin.$ad;

echo "$adres - ".$_FILES["dosya"]["name"]."<br>";
/*
echo ftp_pwd($ftp)."<br>";


ftp_mkdir($ftp,$dizin);
ftp_chmod($ftp,0777,$dizin);

$sonuc= ftp_put($ftp,$adres,$_FILES["dosya"]["tmp_name"],FTP_BINARY);
*/
move_uploaded_file($_FILES["dosya"]["tmp_name"],$adres);

header("location:?uyari=1");

}



if($get->islem=="sil")
{
unlink($get->ad);
header("location:?uyari=1");
}


if($get->uyari==1)
print "İşlem tamamdır.<br>";


print "
<form action=?islem=yukle  method=post enctype=multipart/form-data>
<input type=file name=dosya>
<input type=submit value=yükle>
</form><br><br>";


$slayt_adres="/resimler/slayt/";

$dizin="$ROOT/$slayt_adres";
$resim_url=$slayt_adres;

$d=opendir($dizin);
if($d)
while($s=readdir($d))
{
if($s!=".." && $s!="." && $s!="kapak")
print "<div style='float:left;padding:2;height:200;border:1px solid #EFEFEF;'>
<img width=150 src=$resim_url/$s><br><a href=?islem=sil&ad=$dizin/$s>Sil</a></div>";
}
require_once "2.php";
?> 
