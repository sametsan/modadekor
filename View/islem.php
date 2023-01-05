<?

Core\View::require("1.php");

$is = Core\Url::$params[0];

tema_tablo_ac("İşlem sonucu!");
echo "<br><br><center>";
switch ($is) {
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
    case "uye_giris": {

            if (!$post->kullanici || !$post->parola) {
                print "Boşlukları doldurun!";
                break;
            }

            $sql = $db->query("SELECT * FROM uyeler WHERE kullanici='$post->kullanici'");
            if (!$s = $sql->fetch_object() {
                print "Böyle bir kullanıcı yok.";
                break;
            }

            if (md5($post->parola) != $s->parola) {
                print "Şifre yanlış.";
                break;
            }

            $session->yap("UYE_no", $s->no);
            $session->yap("UYE_parola", $s->parola);
            print "Üye girişi başarılı";
            header("location:index.php");
            break;
        }
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
    case "uye_cikis": {
            $session->yap("UYE_no", "");
            $session->yap("UYE_parola", "");
            header("location:$server->HTTP_REFERER");
            break;
        }
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // d
    case "sepet_ekle":
        if (!giris())
            header("location:giris.php");
        $db->query("INSERT INTO sepet (uye,urun,adet) VALUES ('$session->UYE_no','$get->no','$get->adet')");
        header("location:$server->HTTP_REFERER");
        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // d
    case "taksitle_al":
        if (!giris())
            header("location:giris.php");

        $sql = $db->query("SELECT * FROM taksitler WHERE no='$post->sayfa'");
        $d = $sql->fetch_object(;

        echo $d->adres;

        header("location:$d->adres");
        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // d
    case "sepet_bosalt":
        if (!giris())
            header("location:giris.php");
        $db->query("DELETE FROM sepet WHERE uye='$session->UYE_no'");
        header("location:$server->HTTP_REFERER");
        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // dd
    case "sepet_kaldir":
        if (!giris())
            header("location:giris.php");
        $db->query("DELETE FROM sepet WHERE no='$get->no'");
        header("location:$server->HTTP_REFERER");
        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // d
    case "siparis_et":
        if (!giris())
            header("location:giris.php");


        $sql = $db->query("SELECT * FROM sepet WHERE uye='$session->UYE_no'");

        if (!$sql) {
            print "Sepetiniz boş.";
            break;
        }

        if (!$post->odeme) {
            print "Lütfen ödeme şeklini seçiniz.";
            break;
        }


        $kalan = flood(60);
        if ($kalan > 0) {
            print $kalan . " sn sonra deneyin..";
            break;
        }

        while ($d = $sql->fetch_object() {
            $tarih = date("d.m.Y");
            $saat = date("H:i:s");
            $db->query("UPDATE urunler SET adet=adet-$d->adet WHERE no='$d->urun'");
            $db->query("INSERT INTO siparisler (uye_no,urun,adet,tarih,saat,odeme) VALUES ('$session->UYE_no','$d->urun','$d->adet','$tarih','$saat','$post->odeme')") or die($db->error());
        }

        $db->query("DELETE FROM sepet WHERE uye='$session->UYE_no'") or die($db->error());
        echo "İşleminiz tamamdır...";


        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
    case "urun_soru":
        if (!giris())
            header("location:giris.php");
        $l = flood(15);
        if ($l > 0) {
            header("location:urun_soru.php?uyari=3&urun=$post->urun");
            $hata = 1;
        }

        if (!$post->mesaj) {
            header("location:urun_soru.php?uyari=2&urun=$post->urun");
            $hata = 1;
        }
        $zaman = date("d.m.y H:i:s");
        if (!$hata) {
            $db->query("INSERT INTO mesajlar (yazan,uye_no,urun_no,mesaj,uye_ziyaret,zaman) VALUES ('$session->UYE_no','$session->UYE_no','$post->urun','$post->mesaj',1,'$zaman')");
            header("location:urun_soru.php?uyari=1&urun=$post->urun");
        }
        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // d
    case "profil_duzenle";
        if (!giris())
            header("location:giris.php");

        $db->query("UPDATE uyeler SET ad='$post->ad' WHERE no=$session->UYE_no") or die($db->error());
        $db->query("UPDATE uyeler SET soyad='$post->soyad' WHERE no=$session->UYE_no") or die($db->error());
        $db->query("UPDATE uyeler SET telefon='$post->telefon' WHERE no=$session->UYE_no") or die($db->error());
        $db->query("UPDATE uyeler SET eposta='$post->eposta' WHERE no=$session->UYE_no") or die($db->error());
        $db->query("UPDATE uyeler SET adres='$post->adres' WHERE no=$session->UYE_no") or die($db->error());
        $db->query("UPDATE uyeler SET il='$post->il' WHERE no=$session->UYE_no") or die($db->error());
        $db->query("UPDATE uyeler SET ilce='$post->ilce' WHERE no=$session->UYE_no") or die($db->error());
        if ($post->parola)
            if ($post->parola == $post->parola_tekrar) {
                $db->query("UPDATE uyeler SET parola='" . md5($post->parola) . "' WHERE no=$session->UYE_no") or die($db->error());
                $session->yap("UYE_parola", md5($post->parola));
            } else
                header("location:profil.php?uyari=2");
        header("location:profil.php?uyari=1");
        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // dd

    case "uye_ol";

        if ($post->parola != $post->parola_tekrar) {
            print "<div class=uyari>Parola eşleşmiyor.</div>";
            $hata = 1;
        }

        if (!$post->parola || !$post->parola_tekrar || !$post->kullanici || !$post->ad || !$post->soyad || !$post->adres || !$post->telefon || !$post->eposta || !$post->il || !$post->ilce) {
            print "<div class=uyari>Boşlukları doldurun</div>";
            $hata = 1;
        }

        $sql = $db->query("SELECT * FROM uyeler WHERE kullanici='$post->kullanici'");
        if ($db->fetch_array($sql)) {
            print "<div class=uyari>Böyle bir kullanıcı var.</div>";
            $hata = 1;
        }


        if ($hata != 1) {
            $parola = md5($post->parola);
            $db->query("INSERT INTO uyeler (kullanici,parola,ad,soyad,adres,telefon,eposta,il,ilce) VALUE ('$post->kullanici','$parola','$post->ad','$post->soyad','$post->adres','$post->telefon','$post->eposta','$post->il','$post->ilce')");
            print "<div class=uyari>İşlem tamamdır</div>";
        }

        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // 

    case "mesaj_gonder";
        if (!giris())
            header("location:giris.php");

        $l = flood(15);


        if ($l > 0) {
            print "<div class=uyari>$l sn bekleyin.</div>";
            break;
        }


        if (!$post->mesaj) {
            print "<div class=uyari>Boşlukları doldurun.</div>";
            break;
        }

        $zaman = date("d.m.Y H:i:s");


        $db->query("INSERT INTO mesajlar (yazan,uye_no,urun_no,mesaj,zaman) VALUES ('$session->UYE_no','$session->UYE_no','$post->urun','$post->mesaj','$zaman')");
        print "<div class=uyari>İşlem tamamdır</div>";

        break;
        // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 
    case "mesaj_temizle";

    if (!giris())
    header("location:giris.php");
    
        $db->query("DELETE FROM mesajlar WHERE uye_no='$session->UYE_no'");

        print "<div class=uyari>İşlem tamamdır</div>";
        break;
}

echo "<br><br>";
tema_tablo_kapat();


Core\View::require("2.php");
