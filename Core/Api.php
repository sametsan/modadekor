<?php
namespace Core;


class Api{

    public static function db(){

        $db = new \mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME)or die("Database connection not established.");

        if ($db->connect_errno) {
            throw new \Exception(__FILE__."Failed to connect to MySQL: " . $db->connect_error);
            $db=NULL;
          }

        return $db;
    }
  
};


?>