<?php
namespace Api\Model;

class Storage extends \Core\Api{

    private static $table_name="storage";

    public static  function url($dosya){
        return "http://".$_SERVER['HTTP_HOST']."/".APP_STORAGE_PATH.$dosya;
    }

    public static  function fullPath($dosya){
        return APP_STORAGE_FULLPATH."/".$dosya;
    }


    public static function getAllByRecordId($record_id){
        $liste = [];
        $sql = self::db()->query("SELECT * FROM ".self::$table_name." WHERE record_id='$record_id'");

        while($s=$sql->fetch_object())
            array_push($liste,$s);

        return $liste;
    }


    public static  function upload($tmp_adres){

        $ret = 0;

        if(!file_exists(APP_STORAGE_FULLPATH)){
            mkdir(APP_STORAGE_FULLPATH);
            chmod(APP_STORAGE_FULLPATH,0777);
        }
    
        $tip=end(explode('.', $tmp_adres));
        $uzanti=$tip[1];
        $ad=date("ymdHis").".$uzanti";
    
    
        if($d=move_uploaded_file($tmp_adres, APP_STORAGE_FULLPATH."/$ad")){

            self::db()->query("INSERT INTO ".self::$table_name." (file) VALUES ('$ad')")or die(self::db()->error());
            $sql=self::db()->query("SELECT * FROM ".self::$table_name." ORDER BY id DESC")or die(self::db()->error());
            $s=$sql->fetch_object();
            
            $ret = $s->no;
            
        }else{
    
           $ret =0;
        }
    
        return $ret;


    }


    public static function delete($id){

        $sql=self::db()->query("SELECT * FROM ".self::$table_name." WHERE id='$id'")or die(self::db()->error());
        $s=$sql->fetch_object();
        unlink("$s->file");
        if(!file_exists($s->file)){
            self::db()->query("DELETE FROM ".self::$table_name." WHERE id='$id'")or die(self::db()->error());
            return 1;
        }
        else
            return 0;
    }


    public static function get($id){
        $sql=self::db()->query("SELECT * FROM ".self::$table_name." WHERE id='$id'")or die(self::db()->error());
        return $sql->fetch_object();   
    }

    public static  function update($id,$record_id){
        self::db()->query("UPDATE ".self::$table_name."  SET record_id='$record_id' WHERE id='$id'")or die(self::db()->error());
        return TRUE;
    }
    

};






?>
