<?
namespace Core;


session_start();
ob_start();
error_reporting(E_ALL);

include "Core/Loader.php";

set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


logging(__FILE__,"-----------------------------------");

Router::run();

?>