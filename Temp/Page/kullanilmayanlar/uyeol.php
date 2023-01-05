<?
include "1.php";


if($get->islem=="ekle"){

}


print "<title>Üye Ol</title>";


switch($get->uyari){
case 1 : print "<div class=uyari>İşlem tamamdır</div>"; break;
case 2 : print "<div class=uyari>Parola eşleşmiyor.</div>"; break;
case 3 : print "<div class=uyari>Boşlukları doldurun</div>"; break;
case 4 : print "<div class=uyari>Böyle bir kullanıcı var.</div>"; break;
}

tema_tablo_ac("Üye Ol");

print "<center><table border=0 width=100%>";
print "<form action=?islem=ekle method=post>";
print "<tr><td>Ad : </td><td><input  type=text name=ad></td></tr>";
print "<tr><td>Soyad : </td><td><input   type=text name=soyad></td></tr>";
print "<tr><td>Kullanıcı Adı : </td><td><input   type=text name=kullanici></td></tr>";
print "<tr><td>Parola : </td><td><input   type=password name=parola ></td></tr>";
print "<tr><td>Parola Tekrar : </td><td><input   type=password name=parola_tekrar ></td></tr>";
print "<tr><td>Telefon : </td><td><input   type=text name=telefon ></td></tr>";
print "<tr><td>E-posta : </td><td><input   type=text name=eposta ></td></tr>";
print "<tr><td>İl : </td><td><input   type=text name=il ></td></tr>";
print "<tr><td>İlçe : </td><td><input   type=text name=ilce ></td></tr>";
print "<tr><td>Adres : </td><td><textarea class=yazi-alani  name=adres cols=30 rows=5></textarea></td></tr>";
print "<tr><td> </td><td><input class=buton  type=submit value='Kaydet' ></td></tr>";
print "</form>";
print "</table></center>";

tema_tablo_kapat();

include "2.php";
?> 
