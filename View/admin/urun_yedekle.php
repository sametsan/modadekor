<?
require_once "bas.php";


$baslik=ayar_al("site_baslik");
$tarih=date("d.m.y");
$dosya=date("ymd").".txt";


header('Content-type: application/text');
header("Content-Disposition: attachment; filename=$dosya");

echo "//$baslik \t $tarih \n\n";
echo "Ürün Listesi\n";
echo "Ürün adı | Adet | Fiyat \n";


if($get->kno)
$sql=$db->query("SELECT * FROM urunler WHERE kno='$get->kno'");
else
$sql=$db->query("SELECT * FROM urunler");


while($s=$sql->fetch_object()
{


echo "$s->ad | $s->adet | $s->fiyat \n";


}


?> 
