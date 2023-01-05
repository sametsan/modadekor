<?

function tema_tablo_ac($baslik="")
{
print "<div class=tablo>";
if($baslik)
print "<h3>$baslik</h3>";
print "<p>";
}

function tema_tablo_kapat()
{
print "</p>";
print "</div>";
}

function tema_eklenti_ac($baslik="",$resim)
{
print "<div class=eklenti>";

if($baslik){
print "<h3>";
if($resim)
echo "<img src=$resim>";
echo "$baslik</h3>";
}
print "<p>";
}

function tema_eklenti_kapat()
{
print "</p>";
print "</div>";
}


?> 
