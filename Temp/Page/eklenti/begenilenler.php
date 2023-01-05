<?;

tema_eklenti_ac("Beğenilenler","tema/begenilenler.png");

$a=0;
$sql=$db->query("SELECT * FROM urunler ORDER BY begen DESC");
print "<div class=urun-satir>";
while($s=$sql->fetch_object()
{
echo "<li><a href=urun.php?no=$s->no>$s->ad</a></li>";
// urun_ufak($s);
if($a==10)break;
$a=$a+1;
}
print "</div><br>";

tema_eklenti_kapat();


?>