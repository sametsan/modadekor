<?
namespace Core;

function include_all_php($folder){
    foreach (glob("{$folder}/*.php") as $filename)
    {
        require_once $filename;
    }
}

include_all_php("Config/");
require_once "Core/logging.php";
require_once "Core/Url.php";
require_once "Core/Api.php";
require_once "Core/View.php";
require_once "Core/Router.php";
require_once "Core/Error.php";
require_once "Core/Storage.php";
require_once "Core/Helper.php";

include_all_php("Api/");

?>