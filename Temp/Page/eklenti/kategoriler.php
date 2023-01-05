

<div class=kategoriler>
<?
$sql=$db->query("SELECT * FROM kategoriler WHERE kno=0 ORDER BY sira");
while($s=$sql->fetch_object()
{
echo "<div class=kategori onmouseover=\"menu('liste_$s->no',1)\" onmouseout=\"menu('liste_$s->no',0)\" >
<a href=#>$s->kategori</a>";

$sqld=$db->query("SELECT * FROM kategoriler WHERE kno=$s->no ORDER BY sira");
if($sqld==TRUE){
echo "<div class=liste id=liste_$s->no>";
while($d=$db->fetch_object($sqld))
echo "<a href=liste.php?kno=$d->no>$d->kategori</a>";
echo "</div>";
}

echo "</div>";
}

?>
</div>
