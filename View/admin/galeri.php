<?php

function galeri_yukle($dizin,$tmp_adres){

    $ret = 0;

    if(!file_exists($dizin)){
        print("Dizin yok <br>");
        mkdir("$dizin");
        chmod("$dizin",0777);
    }

    $tip=end(explode('.', $tmp_adres));
    $uzanti=$tip[1];
    $ad=date("ymdHis").".$uzanti";


    if($d=move_uploaded_file($tmp_adres, "$dizin/$ad")){

        print("Resim yüklendi. Ekleniyor... <br>");
        $db->query("INSERT INTO galeri (adres) VALUES ('$ad')")or die($db->error());
        $sql=$db->query("SELECT * FROM galeri ORDER BY no DESC");
        $s=$sql->fetch_object(;
        
        $ret = $s->no;

        print("Resim eklendi. [$ret] <br>");
    }else{

        print("Resim yüklenemedi. [$dizin/$ad] <br>");
    }

    return $ret;

}


function galeri_sil($no){

    $sql=$db->query("SELECT * FROM galeri WHERE no='$no'");
    $s=$sql->fetch_object(;
    unlink("$s->adres");
    if(!file_exists($s->adres)){
        $db->query("DELETE FROM kategoriler WHERE no='$no'");
        return 1;
    }
    else
        return 0;
}


function galeri_adres($no){
    $sql=$db->query("SELECT * FROM galeri WHERE no='$no'");
    $s=$sql->fetch_object(;   
    return $s->adres;
}

?>
