<?php


print "<title>Giriş</title>";


print "<div class=tablo>";
print "<h3>Giriş Yap</h3>";
print "<p>";

echo "
<center>
<form action=islem.php?islem=uye_giris method=post>
<table border=0>
<tr><td>Kullanıcı Adı : </td></tr>
<tr><td><input class=girdi  type=text id=kullanici name=kullanici></td></tr>
<tr><td>Şifre : </td></tr>
<tr><td><input  class=girdi type=password id=parola  name=parola></td></tr>
<tr><td><input type=image src=tema/gir.png></td></tr>

</form>
</table>
</center>
";

print "</p>";
print "</div>";

?>
