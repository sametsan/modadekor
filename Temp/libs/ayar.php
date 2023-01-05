<?

function ayar_varmi($d)
{
  $var = 0;
  $sql = $db->query("SELECT* FROM ayarlar");
  while ($s = $sql->fetch_object() {
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
  if(!$d)  return FALSE;
  
  $sql = $db->query("SELECT* FROM ayarlar WHERE degisken='$d'");
  $s = $sql->fetch_object(;

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


?>