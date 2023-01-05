<?
require_once "1.php";

switch($get->islem)
{
case "ekle":

if(!$post->ad || !$post->tanim || !$post->aciklama || !$post->adet || !$post->fiyat)
{
    print "Boşlukları doldurun.<br>";
    $hata=1;
}

if(!is_numeric($post->adet) || !is_numeric($post->teslim_suresi)){
    print "Adet veya teslim suresi sayı olmak zorunda...<br>";
    $hata=1;
}

if(!$post->indirim)$post->indirim=0;
if(!$post->vitrin)$post->vitrin=0;
if(!$post->vitrin_sira)$post->vitrin_sira=0;
if(!$post->eski_fiyat)$post->eski_fiyat=0;


if($hata!=1){
    $sql=$db->query("INSERT INTO urunler (kno,ad,tanim,aciklama,adet,fiyat,indirim,teslim_suresi,vitrin,vitrin_sira,eski_fiyat)
    VALUES ('$post->kategori','$post->ad','$post->tanim','$post->aciklama','$post->adet','$post->fiyat','$post->indirim','$post->teslim_suresi','$post->vitrin','$post->vitrin_sira','$post->eski_fiyat')");

    if(!$sql) print $db->error();
    else{
        $sqll=$db->query("SELECT * FROM urunler ORDER BY no DESC");
        $f=$db->fetch_object($sqll);
        print("NO : $f->no <br>");
        header("location:resim_yukle.php?no=$f->no");
    }


}

    print "<a href='?sayfa=$get->islem'>Geri</a>";
break;

case "duzenle":
if($post->indirim==1)
$indirim=1;
else
$indirim=0;

if($post->vitrin==1)
$vitrin=1;
else
$vitrin=0;


$db->query("UPDATE urunler set ad='$post->ad' where no=$get->no");
$db->query("UPDATE urunler set kno=$post->kategori where no=$get->no");
$db->query("UPDATE urunler set tanim='$post->tanim' where no=$get->no");
$db->query("UPDATE urunler set aciklama='$post->aciklama' WHERE no=$get->no");
$db->query("UPDATE urunler set adet=$post->adet WHERE no=$get->no");
$db->query("UPDATE urunler set fiyat=$post->fiyat WHERE no=$get->no");
$db->query("UPDATE urunler set eski_fiyat=$post->eski_fiyat WHERE no=$get->no");
$db->query("UPDATE urunler set indirim=$indirim  WHERE no=$get->no");
$db->query("UPDATE urunler set vitrin=$vitrin  WHERE no=$get->no");
$db->query("UPDATE urunler set vitrin_sira=$post->vitrin_sira  WHERE no=$get->no");
$db->query("UPDATE urunler set teslim_suresi=$post->teslim_suresi  WHERE no=$get->no");
print "İşlem tamamdır...<a href='?sayfa=$get->islem&no=$get->no'>Geri</a>";
break;

case "sil":
$db->query("DELETE FROM urunler WHERE no=$get->no");
if(file_exists("../resimler/$get->no"))
unlink("../resimler/$get->no");
print "İşlem tamamdır...<a href=urunler.php>Geri</a>";
break;

}


$islem="ekle";
$dugme="Kaydet";

if($get->no){
$sql_urun=$db->query("SELECT * FROM urunler WHERE no=$get->no");
$urun=$db->fetch_object($sql_urun);
echo "<h3><a href=urun.php?no=$get->no>$urun->ad</a> | <a href=urun.php?islem=sil&no=$get->no>Ürünü Sil</a> | <a href=resim_yukle.php?no=$get->no>Resim Yükle</a> | <a href=taksit.php?no=$get->no>Taksit Ekle</a></h3>";
}


print "<form action=?islem=$islem&no=$urun->no method=post>";
print "<table border=0>";
print "<tr><td>Kategori : </td><td><select name=kategori>";

$sqlk=$db->query("SELECT * FROM kategoriler ");
while($c=$db->fetch_object($sqlk)){

if($get->kno)
$kno=$get->kno;

if($urun->kno)
$kno=$urun->kno;

if($kno==$c->no)
print "<option value=$c->no SELECTED> $c->kategori</option>";
else
print "<option value=$c->no> $c->kategori</option>";

}
print "</select></td></tr>";

print "<tr><td>Ürün Adı : </td><td><input type=text name=ad value='$urun->ad'></td></tr>";
print "<tr><td>Tanım : </td><td><textarea rows=2 name=tanim>$urun->tanim </textarea> </td></tr>";
print "<tr><td>Adet : </td><td><input type=text name=adet value='$urun->adet'></td></tr>";
print "<tr><td>Fiyat : </td><td><input type=text name=fiyat value='$urun->fiyat'></td></tr>";
print "<tr><td>Teslim Süresi : </td><td><input type=text name=teslim_suresi value=$urun->teslim_suresi></td></tr>";
if($urun->indirim==1)
print "<tr><td>İndirim : </td><td><input type=checkbox name=indirim value=1 checked></td></tr>";
else
print "<tr><td>İndirim : </td><td><input type=checkbox name=indirim value=1 ></td></tr>";
print "<tr><td>Eski Fiyat : </td><td><input type=text name=eski_fiyat value='$urun->eski_fiyat'></td></tr>";

if($urun->vitrin==1)
print "<tr><td>Vitrine Ekle : </td><td><input type=checkbox name=vitrin value=1 checked></td></tr>";
else
print "<tr><td>Vitrine Ekle : </td><td><input type=checkbox name=vitrin value=1></td></tr>";
print "<tr><td>Vitrin Sıra : </td><td><input type=text name=vitrin_sira value='$urun->vitrin_sira'></td></tr>";


print "<tr><td>Açıklama : </td><td><textarea name=aciklama cols=60 rows=10>$urun->aciklama</textarea></td></tr>";

print "<tr><td> </td><td><input type=submit value='$dugme'></td></tr>";
print "</table>";
print "</form>";
require_once "2.php";
?> 
