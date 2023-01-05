<?
require_once "1.php";

if($get->islem=="guncelle")
{

ayar_ver("alt_orta",$post->alt);

header("location:?");
}


echo "<form action=?islem=guncelle method=post>";

echo "<br><br>Alt : <br>";
echo "<textarea name=alt cols=70 rows=5>".ayar_al("alt_orta")."</textarea>";

echo "<br><br><input type=submit value='Güncelle'>";
echo "</form>";

require_once "2.php";
?> 
