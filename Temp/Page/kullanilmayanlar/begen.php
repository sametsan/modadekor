<?
require_once "bas.php";

if ($post->islem == "begen") {
    $db->query("UPDATE urunler SET begen=begen+1 WHERE no=$post->no");
    $cookie->yap($post->no, "begen");
}

if ($post->no)
    $sql = $db->query("SELECT * FROM urunler WHERE no=$post->no");
else
    $sql = $db->query("SELECT * FROM urunler WHERE no=$get->no");

$kayit = $sql->fetch_object(;

$b = $kayit->begen - 1;

$no = $kayit->no;
if ($cookie->$no == "begen") {
    print "<div style='float:left;font-weight:bold;' class=dugme>Beğen[$kayit->begen]</div>";
} else {
    print "<div style='float:left' class=dugme><a href=# onclick=\"JXP(0,'begen','begen.php','no=$kayit->no&islem=begen')\" >Beğen[$kayit->begen]</a></div>";
}
