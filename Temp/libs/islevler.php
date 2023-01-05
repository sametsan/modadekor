<?

function dosya_uzanti($dosya)
{
  $array = explode('.', $dosya);
  $key   = count($array) - 1;
  $sonuc   = $array[$key];
  return $sonuc;
}

function ayar_varmi($d)
{
  $var = 0;
  $sql = $db->query("SELECT* FROM ayarlar");
  while ($s = $sql->fetch_object() ){
    if ($s->degisken == $d) {
      $var = 1;
      break;
    }
  }

  if ($var == 1)
    return TRUE;
  else
    return FALSE;
}

function ayar_al($d)
{
  $sql = $db->query("SELECT* FROM ayarlar WHERE degisken='$d'");
  $s = $sql->fetch_object();

  if ($s->deger)
    return $s->deger;
  else
    return FALSE;
}

function ayar_ver($d, $s)
{
  if (ayar_varmi($d) == TRUE)
    $sql = $db->query("UPDATE ayarlar SET deger='$s' WHERE degisken='$d'");
  else
    $sql = $db->query("INSERT INTO ayarlar (degisken,deger) VALUES ('$d','$s')");
  return $sql;
}


function ayar_sil($d)
{
  $sql = $db->query("DELETE FROM ayarlar WHERE degisken='$d'");
  return $sql;
}

function flood($d)
{
  $saat = time();
  $flood = $_SESSION["flood"]["saat"];
  $kalan = $flood - $saat;

  if (!$_SESSION["flood"]["saat"]) {
    $_SESSION["flood"]["saat"] = $saat + $d;
    return 0;
  }

  if ($kalan > 0)
    return $kalan;
  else {
    $_SESSION["flood"]["saat"] = $saat + $d;
    return 0;
  }
}


function kod_uret()
{
  return date("ymdHis");
}


function urun_kucuk($s)
{
  $resim = urun_resim($s->no);
  print "<div class=urun>";
  print "<a href=urun.php?no=$s->no><img alt='Resim Yok' title='$s->ad' src='$resim' width=120 height=100 border=0></a><br>";
  print "<a class=urun-ad href=urun.php?no=$s->no>$s->ad</a><hr>";
  print "<span class=urun-tanim>" . nl2br($s->tanim) . "</span><br>";
  print "<span class=urun-fiyat>$s->fiyat TL </span><br>";
  if ($s->indirim == 1) print "<img src=tema/indirim.png width=120>";
  print "<div class=temizle></div>";
  print "</div>";
}

function urun_ufak($s)
{
  $resim = urun_resim($s->no);
  print "<div class=urun-ufak>";
  echo "<img src=$resim width=40 align=left>";
  print "<a class=urun-ad href=urun.php?no=$s->no>$s->ad</a><br>";
  print "<span class=urun-fiyat>$s->fiyat TL </span>";
  print "<div class=temizle></div>";
  print "</div>";
}

function dugme($adres, $yazi)
{
  print "<div class=dugme onmouseover\"this.className='dugme-uzerinde'\" onmouseout=\"this.className='dugme'\" onclick=\"location='$adres'\">$yazi</div>";
}

function urun_resim($no)
{
  $sql = $db->query("SELECT * FROM urunler WHERE no='$no'");
  $s = $sql->fetch_object();
  return "resimler/$no/$s->resim";
}

function giris()
{
  $session = new  _session();
  if ($session->UYE_no) {
    $sql = $db->query("SELECT * FROM uyeler WHERE no=$session->UYE_no");
    $s = $sql->fetch_object();
  } else
    return false;

  if ($session->UYE_parola == $s->parola)
    return true;
  else
    return false;
}

function yonetim()
{
  if (giris()) {
    $session = new  _session();
    $sql = $db->query("SELECT * FROM uyeler WHERE no=$session->UYE_no");
    $s = $sql->fetch_object();
    if ($s->yetki == 1)
      return true;
    else
      return false;
  }
}

function suz($d)
{
  $d = ereg_replace("'", "", $d);
  $d = ereg_replace("<", "&lt;", $d);
  $d = ereg_replace(">", "&gt;", $d);
  $d = htmlspecialchars($d);
  return $d;
}

function htmlkod()
{
  print "Kalın yazı : &lt;b&gt;yazı&lt;/b&gt;<br>";
  print "İtalic yazı : &lt;i&gt;yazı&lt;/i&gt;<br>";
  print "yazı büyüklük ve renk : &lt;font size=büyüklük color=renk&gt;yazı&lt;/font&gt;<br>";
}


function online_uye()
{
  $session = new _session();
  $cookie = new _cookie();
  $server = new _server();

  $saat = time();
  $sure = time() - 1000;
  $ip = $server->REMOTE_ADDR;
  $sayfa = $server->REQUEST_URI;
  $geldigi_sayfa = $server->HTTP_REFERER;
  $tarayici = $server->HTTP_USER_AGENT;
  $ad = $session->UYE_no;


  $mysql = $db->query("select * from online where ip='$ip'");
  $f = $db->num_rows($mysql);
  if ($f == 0) {
    $mysql = $db->query("insert into online (ip,zaman,sayfa,geldigi_sayfa,tarayici,ad) values('$ip','$saat','$sayfa','$geldigi_sayfa','$tarayici','$ad')");
  } else
    $mysql = $db->query("update online set zaman='$saat', sayfa='$sayfa',tarayici='$tarayici',ad='$ad' where ip='$ip'");

  $sorgu = $db->query("Select * from online where zaman>='$sure' AND ad<>''");
  $s = $db->num_rows($sorgu);

  $mysql = $db->query(" delete from online where zaman<'$sure'");
  return $s;
}

function online_misafir()
{
  $session = new _session();
  $cookie = new _cookie();
  $server = new _server();

  $saat = time();
  $sure = time() - 1000;
  $ip = $server->REMOTE_ADDR;
  $sayfa = $server->REQUEST_URI;
  $geldigi_sayfa = $server->HTTP_REFERER;
  $tarayici = $server->HTTP_USER_AGENT;
  $ad = $session->UYE_no;


  $mysql = $db->query("select * from online where ip='$ip'");
  $f = $db->num_rows($mysql);
  if ($f == 0) {
    $mysql = $db->query("insert into online (ip,zaman,sayfa,geldigi_sayfa,tarayici,ad) values('$ip','$saat','$sayfa','$geldigi_sayfa','$tarayici','$ad')");
  } else
    $mysql = $db->query("update online set zaman='$saat', sayfa='$sayfa',tarayici='$tarayici',ad='$ad' where ip='$ip'");

  $sorgu = $db->query("Select * from online where zaman>='$sure' AND ad=''");
  $s = $db->num_rows($sorgu);

  $mysql = $db->query(" delete from online where zaman<'$sure'");
  return $s;
}

function reklam($d)
{
  $adres = "resimler/reklam/$d/";


  $j = opendir($adres);
  while ($s = readdir($j)) {
    if ($s != "." && $s != ".." && substr($s, -3, 3) != "txt") {
      if (file_exists($adres . $s)) {
        if (file_exists($adres . $s . ".txt")) {
          $f = fopen($adres . $s . ".txt", "r");
          $c = fread($f, 9999);
          echo "<a href='$c' target=asdas><img width=98% border=0 src='$adres/$s'></a><br><br>";
        } else
          echo "<img width=98% src='$adres$s'><br><br>";
      }
    }
  }
}

function siparis_durum($no)
{
  switch ($no) {
    case 5:
      $resim = "tema/siparis_iptal.png";
      $durum = "Sipariş İptal!";
      break;
    case 4:
      $resim = "tema/siparis_teslim.png";
      $durum = "Sipariş adrese teslim.";
      break;
    case 3:
      $resim = "tema/siparis_kargo.png";
      $durum = "Sipariş şu an yolda.";
      break;
    case 2:
      $resim = "tema/siparis_tedarik.png";
      $durum = "Ürün tedarik ediliyor!";
      break;
    case 1:
      $resim = "tema/siparis_onay.png";
      $durum = "Siparişiniz onaylandı!";
      break;
    default:
      $resim = "tema/siparis_bekle.png";
      $durum = "Siparişiniz onay bekliyor!";
      break;
  }
  $d["resim"] = $resim;
  $d["durum"] = $durum;

  return $d;
}
