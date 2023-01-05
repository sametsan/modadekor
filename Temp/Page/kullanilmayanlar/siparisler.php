<?
require_once "1.php";
require_once "yetki.php";

print "<title>Siparişlerim</title>";


tema_tablo_ac("Siparişlerim");


$sql = $db->query("SELECT * FROM siparisler WHERE uye_no='$session->UYE_no'");
while ($s = $sql->fetch_object() {
    echo "<div class=siparis>";

    $sqlk = $db->query("SELECT * FROM urunler WHERE no=$s->urun");
    $f = @$db->fetch_object($sqlk);

    $urun_resim = urun_resim($f->no);

    switch ($s->durum) {
        case 5:
            $resim = "tema/siparis_iptal.png";
            $durum = "Sipariş İptal!";
            break;
        case 4:
            $resim = "tema/siparis_teslim.png";
            $durum = "Sipariş adrese teslim.";
            break;
        case 3:
            $resim = "tema/siparis_kargo.png";
            $durum = "Sipariş şu an yolda.";
            break;
        case 2:
            $resim = "tema/siparis_tedarik.png";
            $durum = "Ürün tedarik ediliyor!";
            break;
        case 1:
            $resim = "tema/siparis_onay.png";
            $durum = "Siparişiniz onaylandı!";
            break;
        default:
            $resim = "tema/siparis_bekle.png";
            $durum = "Siparişiniz onay bekliyor!";
            break;
    }




    echo "


<img align=left src='$urun_resim'>

<div class=ad><a target=a href=urun.php?no=$f->no>$f->ad</a> [$s->adet adet]</div>
<div class=aciklama>$s->aciklama</div>
<div class=durum>Durum : $durum</div>


<div class=tarih>
Sipariş Tarihi : $s->tarih $s->saat<br>
Kargo Tarihi :
$s->kargo_tarih <br>
Kargo Saat : 
$s->kargo_saat <br>
Kargo No : 
$s->kargo_no <br>
Kargo Şirket : 
$s->kargo_sirket <br>

</div>



";

    echo "</div>";
}


tema_tablo_kapat();


require_once "2.php";
