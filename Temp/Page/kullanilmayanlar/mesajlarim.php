<?php

include "1.php";

echo "
<a href=islem.php?islem=mesaj_temizle>Mesajlarımı Temizle</a>";

echo "<div class=tablo><form action=islem.php?islem=mesaj_gonder method=post>";
echo "<input type=hidden name=urun value=$get->urun>";
echo "<table border=0>";
echo "<tr><td><textarea class=yazi-alani name=mesaj cols=60 rows=2></textarea></td></tr>";
echo "<tr><td><input  type=image src=tema/gonder.png value=Gönder></td></tr>";
echo "</table></form></div>";


$sql = $db->query("SELECT * FROM mesajlar WHERE uye_no='$session->UYE_no' ORDER BY no DESC");
while ($s = $sql->fetch_object() {
    $db->query("UPDATE mesajlar SET uye_ziyaret=1 WHERE no='$s->no'");

    $sqlu = $db->query("SELECT * FROM uyeler WHERE no='$s->yazan'");
    $uye = $db->fetch_object($sqlu);
    echo "<b>$uye->ad $uye->soyad</b><i>";

    if ($s->uye_ziyaret == 1)
        echo " - Üye  okudu.";
    else
        echo " - Üye  okumadı.";
    if ($s->yonetim_ziyaret == 1)
        echo " - Yönetim okudu.";
    else
        echo " - Yönetim okumadı.";

    echo "<br>(" . $s->zaman . ")";

    echo "</i>";
    if ($s->urun_no) {
        $sqlu = $db->query("SELECT * FROM urunler WHERE no='$s->urun_no'");
        $urun = $db->fetch_object($sqlu);
        $resim = urun_resim($urun->no);
        echo "<a class=secili href=urun.php?no=$urun->no target=asdasdasd><img src='$resim' width=25 align=center> $urun->ad</a><br>";
    }
    echo "<br>$s->mesaj";
    print "<hr>";
}


if ($get->urun) {
    echo "<div class=liste>";
    $sqlu = $db->query("SELECT * FROM urunler WHERE no='$get->urun'");
    $urun = $db->fetch_object($sqlu);
    $resim = urun_resim($urun->no);
    echo "<a class=secili href=urun.php?no=$urun->no target=asdasdasd><img src='$resim' width=25 align=center> $urun->ad</a>";
    echo "</div>";
}

include "2.php";
