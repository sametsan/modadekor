<?php

function logging($sayfa,$veri){
   if(!LOG) return;
   
   $veri = "[$sayfa] | " .$veri . "\n";
   $f = fopen("log.txt","a");
   fwrite($f,$veri,strlen($veri));
}

?>