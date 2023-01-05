<?
namespace Api;


class Records extends \Core\Api{

    private static  $table_name = "records";

    public static function get_showroom(){
        return self::getAll("WHERE showroom='1'");
    }

    public static  function get($id){
        $sql = self::db()->query("SELECT * FROM ".self::$table_name." WHERE id='$id'");
        return $sql->fetch_object();
    }


    public static  function getAll($last_query=""){
        $liste = [];
        $sql = self::db()->query("SELECT * FROM ".self::$table_name." $last_query");

        while($s=$sql->fetch_object())
            array_push($liste,$s);

        return $liste;
    }

    public static  function search($word){
        $liste = [];
        $sql = self::db()->query("SELECT * FROM ".self::$table_name." WHERE name LIKE '%$word%' ORDER BY id DESC ");

        while($s=$sql->fetch_object())
            array_push($liste,$s);

        return $liste;        
    }


    public static  function delete($id){
        if($id > 0){
            self::db()->query("DELETE FROM ".self::$table_name." WHERE id='$id'");
            return TRUE;
        }
        else
            return FALSE;
    }

    public static  function update($id,$degisken){
        $sql = self::db()->query("UPDATE ".self::$table_name."  SET $degisken WHERE id='$id'");
    }


    public static  function insert($sutunlar,$degerler){
        $sql = self::db()->query("INSERT INTO ".self::$table_name." ($sutunlar) VALUES ($degerler)");
        return TRUE;
    }

    public static  function like($id){
        self::db()->query("UPDATE ".self::$table_name."  SET like_count=like_count+1 WHERE id='$id'") or die("Beğen hata! " . self::db()->error());
    }

    public static  function increase_counter($id){
        self::db()->query("UPDATE ".self::$table_name."  SET counter=counter+1 WHERE id='$id'") or die("Sayaç hata! " . $db->error());
    }


};
