<?
require_once "1.php";

echo "  <script type=text/javascript src=../tema/editor.js></script> <script type=text/javascript>
    //<![CDATA[
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    //]]>
    </script>";

if(yonetim())
{
if($get->islem=="duzenle"){

ayar_ver("duyuru",$post->duyuru);

header("location:?");
}}


print "<title>Sözleşme</title>";
print "<div class=tablo>";
print "<div class=tablo-baslik>
<div class=tablo-baslik-sol></div>
<div class=tablo-baslik-sag></div>
<div class=tablo-baslik-orta>Duyuru</div>
</div>
";
print "<div class=tablo-orta>";



print "
<form action=?islem=duzenle method=post>

<textarea name=duyuru cols=70 rows=20 >".ayar_al("duyuru")."</textarea>
<input type=submit value=Kaydet>
</form><br>
";

print "<div class=temizle></div>";
print "</div>";
print "<div class=temizle></div>";
print "</div><br>";

require_once "2.php";
?> 
