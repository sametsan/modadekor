<link href=<?=self::url("tema/css.css")?> rel="stylesheet" type="text/css">
<link rel="shortcut icon" href=<?=self::url("tema/arma.ico")?>> 
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<script src=<?=self::url("tema/eyceks/eyceks.js")?>></script>
<script src=<?=self::url("tema/js.js")?>></script>

<?


$tarayici    = strtolower($_SERVER['HTTP_USER_AGENT']);

if(preg_match("/firefox/",$tarayici)) 
    echo "<link rel=stylesheet type=text/css href=tema/firefox.css>";


if(preg_match("/MSIE/",$tarayici)) 
    echo "<link rel=stylesheet type=text/css href=tema/ie.css>";




?>


