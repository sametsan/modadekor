<?php


print "<div class=tablo>";

print "<h3>İletişim</h3>";
print "<p>";


print nl2br($iletisim);

print "</p>";
print "</div>";




print "<div class=tablo>";

print "<h3>Mesaj Gönder</h3>";
print "<p>";


echo "<form action=?islem=gonder method=post>";
echo "<table border=0 width=100%>";
echo "<tr><td>Ad Soyad*  </td><td><input type=text name=adsoyad></td></tr>";
echo "<tr><td>e-posta* </td><td><input type=text name=eposta></td></tr>";
echo "<tr><td>Mesaj* </td><td><textarea cols=60 rows=5 name=mesaj></textarea></td></tr>";
echo "<tr><td> </td><td><input type=submit value='Gönder'></td></tr>";
echo "</table>";
echo "</form>";


print "</p>";
print "</div>";


?> 
