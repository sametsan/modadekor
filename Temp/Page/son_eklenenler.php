

<div class=soneklenenler>
<h3>Yeni Ürünler</h3>
<marquee onmouseover="this.stop()" onmouseout="this.start()" WIDTH="100%" BEHAVIOR="scroll" SCROLLAMOUNT="8" DIRECTION="right" BGColor=""> 
<?

$storage = new \App\Model\Storage();

foreach($son_eklenenler as $s){
    $link = self::link("urun",[$s->id]);
    $image=$storage->getAllByRecordId($s->id);

    if(count($image) > 0){
        $image_url = $storage->url($image[0]->file);
        echo "<a  href=$link><img src='$image_url' border=0></a>";
    }
}

?>
</marquee>

</div>

