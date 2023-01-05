<?

use App\Model\Storage;
use Core\Url;

echo "<div class=liste>";

$i=0;
print "<div class=liste-satir>";

foreach($urunler as $urun)
{
    if($i==$vitrin_satir){print "</div><div class=liste-satir>";$i=0;}

    echo "<div class=liste-tablo>";

    $link = Url::combine("urun",[$urun->id]);

    $images = Storage::getAllByRecordId($urun->id);

    if(count($images) > 0){
        $image_url = Storage::url($images[0]->file);
    }else{
        $image_url = self::url("tema/no_image.png");
    }

    print "<a href=$link><img alt='Resim Yok' title='$urun->name' src='$image_url'border=0></a><br>";

    $i=$i+1;
    echo "</div>";
}

echo "</div>";
echo "</div><br>";


echo "<div class=sayfala>";
for($i=1; $i < $sayfa_sayisi; $i++)
{
    $link = Url::combine("liste",[$kategori,$i]);

    if($sayfa==$i)
        print "<a class='sayfala-secili' href=$link>$i </a>";
    else
        print "<a class='sayfala-sec' href=$link>$i </a>";
} 

print "<div class=temizle></div>";
echo "</div>";
