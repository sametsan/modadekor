<?
require_once "1.php";
require_once "yetki.php";

echo "
<script>
function hesapla(kargo,toplam)
{
var top=kargo+toplam;
document.getElementById('kargo_ucreti').innerHTML=kargo+' TL';
document.getElementById('genel_toplam').innerHTML=top+' TL';
}

</script>

";


tema_tablo_ac("Sepetim");


$sql = $db->query("SELECT * FROM sepet WHERE uye='$session->UYE_no'");

if ($db->num_rows($sql) > 0) {


    echo "<div class=sepet><table>";
    echo "<tr>
<td>Ürün Adı </td>
<td width=15>Miktar</td>
<td width=15>Fiyat </td>
<td width=15>Sil </td>
</tr>";

    while ($d = $sql->fetch_object() {
        $sqlf = $db->query("SELECT * FROM urunler WHERE no=$d->urun");
        $f = $db->fetch_object($sqlf);

        print "<tr>
<td> <a href=urun.php?no=$f->no>$f->ad</a></td>
<td>$d->adet</td>
<td>$f->fiyat TL</td>
<td><a href=islem.php?islem=sepet_kaldir&no=$d->no>Sil</a></td></tr>";
        $toplam = $toplam + ($f->fiyat * $d->adet);
    }

    print "<tr><td></td><td></td><td>Toplam :</td><td> $toplam TL</td></tr>";

    echo "</table></div><br><br>";


    echo "<form action=islem.php method=post>";
    tema_tablo_ac("Ödeme");

    $sql = $db->query("SELECT * FROM odemeler");
    while ($s = $sql->fetch_object() {
        if ($toplam >= $s->asgari && $s->azami > $toplam)
            echo "<input type=radio onclick=\"hesapla($s->fiyat,$toplam)\" id=odeme_$s->no name=odeme value=$s->no checked><label for=odeme_$s->no> $s->ad<br>$s->aciklama</label><br><br>";
        $kargo = $s->fiyat;
    }

    $genel = $toplam + $kargo;

    echo "<div class=sepet><table>
<tr><td>Sepetim Toplam : </td><td width=50>$toplam TL</td></tr>
<tr><td>Kargo Ücreti : </td><td width=50><div id=kargo_ucreti>$kargo TL</div></td></tr>
<tr><td>Genel Toplam : </td><td><div class=genel-toplam id=genel_toplam>$genel TL</div></td></tr>
</table></div>";
    tema_tablo_kapat();

    tema_tablo_ac("Sözleşme");


    echo "<br><div class=sozlesme>" . ayar_al("sozlesme") . "</div><br>";
    echo "<input type=hidden name=islem value='siparis_et'>";
    echo "<input type=checkbox id=sozlesme_onay onclick=\"sozlesme_kabul()\" > Sözleşmeyi kabul ediyorum.<br>";
    echo "<input type=submit id=sozlesme_dugme class=dugme value='Satın Al' disabled>";


    tema_tablo_kapat();
    echo "</form>";
} else
    echo "<center><img width=150 src=tema/dikkat.png><br><br><b>Sepetiniz boş!</b></center>";
tema_tablo_kapat();

require_once "2.php";
