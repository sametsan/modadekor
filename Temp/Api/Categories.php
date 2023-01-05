<?
namespace Api\Model;


class Categories extends \Core\Api{

    private static  $table_name = "categories";

   public static  function get($id){
        $sql = self::db()->query("SELECT * FROM ".self::$table_name." WHERE id=$id");
        return $sql->fetch_object();
    }


    public static  function getAll($last_query=""){
        $liste = [];
        $sql = self::db()->query("SELECT * FROM ".self::$table_name." $last_query");
        while($s=$sql->fetch_object())
            array_push($liste,$s);

        return $liste;
    }

    public static  function insert($sutunlar,$degerler){
        $sql = self::db()->query("INSERT INTO ".self::$table_name." ($sutunlar) VALUES ($degerler)");
        return TRUE;
    }


    public static  function delete($no){
        if($no > 0){
            self::db()->query("DELETE FROM ".self::$table_name."  WHERE no=$no");
            return TRUE;
        }
        else
            return FALSE;
    }


    public static  function update($no,$deger){
        $sql = self::db()->query("UPDATE ".self::$table_name."  SET $deger WHERE no='$no'");
        return TRUE;
    }
    

};


?>