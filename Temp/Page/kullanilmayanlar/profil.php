<?
include "1.php";
require_once "yetki.php";


if (giris()) {
    $sql = $db->query("SELECT * FROM uyeler WHERE no=$session->UYE_no");
    $s = $sql->fetch_object(;
}

print "<div class=tablo>";

print "<h3>$s->kullanici</h3>";

print "<table border=0 width=100%>";
print "<form action=islem.php?islem=profil_duzenle method=post>";
print "<tr><td>Ad : </td><td><input class=girdi type=text name=ad value='$s->ad'></td></tr>";
print "<tr><td>Soyad : </td><td><input class=girdi  type=text name=soyad value='$s->soyad'></td></tr>";
print "<tr><td><br><b>Şifre İşlemleri</b> </td><td></td></tr>";
print "<tr><td>Parola : </td><td><input class=girdi  type=password name=parola ></td></tr>";
print "<tr><td>Parola Tekrar : </td><td><input class=girdi  type=password name=parola_tekrar ></td></tr>";
print "<tr><td></td><td><b>İletişim Bilgileri</b> </td></tr>";
print "<tr><td>Telefon : </td><td><input class=girdi  type=text name=telefon value='$s->telefon'></td></tr>";
print "<tr><td>e-posta : </td><td><input  class=girdi type=text name=eposta value='$s->eposta' ></td></tr>";
print "<tr><td>İl : </td><td><input class=girdi  type=text name=il value='$s->il' ></td></tr>";
print "<tr><td>İlçe : </td><td><input  class=girdi type=text name=ilce value='$s->ilce' ></td></tr>";
print "<tr><td>Adres : </td><td><textarea class=yazi-alani name=adres cols=30 rows=5>$s->adres</textarea></td></tr>";
print "<tr><td> </td><td><input  type=image src=tema/kaydet.png  ></td></tr>";
print "</form>";
print "</table>";

print "</div>";
include "2.php";
