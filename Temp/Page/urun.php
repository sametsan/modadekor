<?

use App\Model\Session;
use Core\Controller;
use Core\Storage;

echo "
<script type=text/javascript language=javascript src=tema/resim/lytebox.js></script>
<link rel=stylesheet href=tema/resim/lytebox.css type=text/css media=screen />
<script type=text/javascript src=tema/resim/reflex.js></script>
";

print "<div class=tablo>";
if($urun->name)
print "<h3>$urun->name</h3>";
print "<p>";



/*
print "<div>";
print "<div class=urun-ayrinti>";
echo "<table border=0 width=100%>";
echo "<tr>";
echo "<td width=20%><b>Ürün Adedi </b></td>";
if ($urun->adet == 0) echo "<td>:Ürünümüz stokta kalmamış</td>";
else echo "<td>:$urun->adet</td>";
echo "<td width=20%><b>Ürün Tanımı </b></td>";
echo "<td>:$urun->tanim </td>";
echo "<td width=20%><b>Ürün Fiyatı </b></td>";
echo "<td>:<span class=urun-fiyat>$urun->fiyat TL </span> </td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Teslim Süresi </b></td>";
echo "<td>:$urun->teslim_suresi gün </td>";
echo "<td><b>Ürün takip </b> </td>";
echo "<td>:$urun->sayac kişi takip etmiş</td>";
echo "<td colspan=2>";
if ($urun->indirim == 1) print "<img src=".View::url("tema/indirim.png")." width=120>";
echo "</td>";
echo "</tr>";
echo "</table>";
print "<div class=temizle></div>";
print "</div>";
print "<div class=temizle></div>";
print "</div>";
*/

$resim = Storage::url($urun->resim);

print "<div class=urun-resim>";
$dizin = "resimler/$urun->id/";
if (file_exists($dizin)) {
    $d = opendir($dizin);
    $i = 0;
    while ($g = readdir($d)) {
        if ($g != ".." && $g != "." && $g != "kapak") {
            $adres = "$dizin/$g";
            $genislik = getimagesize($adres);
            if ($genislik[0] > 960)
                print "<a href='$dizin/$g' rel='lytebox[onder]'  ><img  width=100% src=$dizin/$g border=0>&nbsp;</a><br>";
            else
                print "<a href='$dizin/$g' rel='lytebox[onder]'  ><img   src=$dizin/$g border=0>&nbsp;</a><br>";
            $i = $i + 1;
            if ($i == 3) {
                $i = 0;
                print "<br>";
            }
        }
    }
}

print "<div class=temizle></div></div>";
flush();

/*
print "<br><div class=urun-cubuk>";
/*
if($cookie->$no=="begen")
print "<img border=0 src='tema/begendin.png'>";
else
print "<a href=?islem=begen&no=$get->no><img border=0 src='tema/begen.png'></a>";


$facebook_url = 'http://' . $_SERVER['HTTP_HOST'] . "/urun.php?no=$urun->id";
print "<a href=# onclick=\"window.open('http://www.facebook.com/sharer.php?t=$urun->ad&u=$facebook_url','facebook','width=600,height=500,scrollbars=1')\"><img border=0 src=".View::url("tema/paylas.png")."></a>";
// print "<a href=mesajlarim.php?urun=$urun->id><img border=0 src=tema/sorusor.png></a>";
if (Controller::isSessionUser()) {
    print "<div class=urun-sepete-ekle>
<form method=get action='islem.php?islem=sepet_ekle&no=$urun->id&islem=ekle'>
<input size=2 value=1 type=text id=adet name=adet class=urun-sepete-ekle-adet>
<input value=$urun->id type=hidden name=no id=no>
<a class=urun-sepete-ekle-dugme href=# onclick=\"sepete_ekle()\"><img src=tema/sepeteekle.png></a>

</form>
</div>  ";

    $sqlt = $db->query("SELECT * FROM taksitler WHERE urun='$get->no'");
    if ($sqlt) {
        print "<div class=urun-sepete-ekle>
<form  target=_blank  method=post action='islem.php?islem=taksitle_al'>
<select name=sayfa  class=urun-sepete-ekle-adet>";

        while ($t = $db->fetch_object($sqlt))
            echo "<option value=$t->no>$t->sayfa</option>";

        echo "
</select>
<input class=urun-sepete-ekle-dugme style=\"margin-top:3;\" type=image src=tema/taksitleal.png>

</form>
</div>  ";
    }
}
print "<div class=temizle></div></div><br>";

*/

if (Session::isAdmin())
    print "
<div class=urun-cubuk>
<div style='float:left'  class=dugme><a href=yonetim/urun.php?no=$urun->id >Ürünü Düzenle</a> - </div>
<div style='float:left'  class=dugme><a href=yonetim/resim_yukle.php?no=$urun->id>Resim Yükle</a></div>
</div><br>
";

print "<div>";
print "<span class=urun-aciklama>" . nl2br($urun->content) . "</span><br><br>";
print "</div>";

print "</p>";
print "</div>";

print "<meta name=title content='$urun->name'/>
<link rel=image_src href='$resim'/>
<meta name=description content='$urun->content'>";

