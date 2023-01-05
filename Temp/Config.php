<?
namespace App;


define("ROOT_PATH",dirname(__DIR__)."/");

define("APP_VIEW_PATH","App/View/");
define("APP_MODEL_PATH","App/Model/");
define("APP_CONTROLLER_PATH","App/Controller/");
define("APP_STORAGE_PATH","App/Storage/");



define("APP_VIEW_FULLPATH",ROOT_PATH.APP_VIEW_PATH);
define("APP_MODEL_FULLPATH",ROOT_PATH.APP_MODEL_PATH);
define("APP_CONTROLLER_FULLPATH",ROOT_PATH.APP_CONTROLLER_PATH);
define("APP_STORAGE_FULLPATH",ROOT_PATH.APP_STORAGE_PATH);


define("URL_SEPERATOR",'-');

define("DB_NAME","modarnet_tayfur");
define("DB_USERNAME","tayfur");
define("DB_PASS","modarnet.1453");
define("DB_HOST","localhost");


define("LOG",true);

define("SHOW_ERRORS",true);

define("MAIN_CONTROLLER", 'index');


?>


