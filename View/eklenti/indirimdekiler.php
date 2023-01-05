<?;

tema_eklenti_ac("İndirimdekiler","tema/indirimdekiler.png");

$a=0;
$sql=$db->query("SELECT * FROM urunler WHERE indirim=1 ORDER BY no DESC");
while($s=$sql->fetch_object()
{

// urun_ufak($s);
echo "<li><a href=urun.php?no=$s->no>$s->ad</a></li>";
if($a==10)break;
$a=$a+1;
}

tema_eklenti_kapat();


?>