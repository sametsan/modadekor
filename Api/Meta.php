<?
namespace Api;

class Meta extends \Core\Api{

    private static $table_name = "meta";

   public static function get($variable){
        $query = self::db()->query("SELECT * FROM ".self::$table_name." WHERE variable='$variable'")or die(self::db()->error());
        $row = $query->fetch_object();
        if($row)
            return $row->value;
        else
            return "";

    }

    public static function getAll($sirala = "ASC",$limit=99999){
        $liste = [];
        $sql = self::db()->query("SELECT * FROM ".self::$table_name." ORDER BY no $sirala LIMIT $limit");
        
        while ($s = $sql->fetch_object()){
            array_push($liste,$s);
        }
        return $liste;
    }

    public static function insert($degisken,$deger){
        $sql = self::db()->query("INSERT INTO ".self::$table_name." (variable,value) VALUES ('$degisken','$deger')");
        return TRUE;
    }


    public static function delete($degisken){
        self::db()->query("DELETE FROM ".self::$table_name."  WHERE variable='$degisken'");
    }


    public static function update($degisken,$deger){
        $sql = self::db()->query("UPDATE ".self::$table_name."  SET value='$deger' WHERE variable='$degisken'");
        return TRUE;
    }
    

};


?>