<?

use \App\Model\Storage;

echo "<div class=liste>";
$i=0;
$satir=0;

print "<div class=liste-satir>";
foreach($vitrin as $urun)
{
    if($i==$vitrin_sutun){print "</div><div class=liste-satir>";$satir++;$i=0;}
    if($satir==$vitrin_satir){break;}

    $link = self::link("urun",[$urun->id]);
    $image=Storage::getAllByRecordId($urun->id);

    if(count($image) > 0){
        $image_url = Storage::url($image[0]->file);
    }else{
        $image_url = self::url("tema/no_image.png");
    }

    echo "<div class=liste-tablo>";

    print "<a href=$link><img alt='Resim Yok' title='$urun->name' src='$image_url' border=0></a><br>";

    // print "<div class=ad><a class=urun-ad href=urun.php?no=$s->no>$s->ad</a></div>";
    // print "Fiyat : <span class=fiyat>$s->fiyat TL </span><br>";
    // print "<div class=tanim>".nl2br($s->tanim)."</div>";
    // if($s->indirim==1)print "<img class=indirim src=tema/indirim.png width=120></td>";

    $i=$i+1;

    echo "</div>";
}

echo "</div>";
echo "</div>";

?>