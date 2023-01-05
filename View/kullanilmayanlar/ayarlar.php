<?


// MSQYL Config


$db_kullanici="tayfur";
$db_alan="localhost";
$db_parola="modarnet.1453";
$db_veriTabani="modarnet_tayfur";
/*
$db_kullanici="root";
$db_alan="localhost";
$db_parola="";
$db_veriTabani="ha";
*/

 $db = new mysqli($db_alan,$db_kullanici,$db_parola,$db_veriTabani)or die("Database connection not established.");

if ($db -> connect_errno) {
    echo "Failed to connect to MySQL: " . $db -> connect_error;
    exit();
  }

/*
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER SET utf8");
$db->query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'"); 

*/
// Galeri ayarları

$GALERI = "resimler/";







// 

$siparis_durum=array(
array("yeni","Yeni"),
array("onayli","OnaylI"),
array("tedarik","Tedarik Ediliyor"),
array("kargoda","Kargoda"),
array("teslim","Teslim"),
array("iptal","İptal"),
);

?> 
