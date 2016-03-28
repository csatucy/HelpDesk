<?php
$locale = false;
if (isSet($_GET["locale"])){
$locale = $_GET["locale"];
setcookie("locale", $locale, time()+60*60*24*30, "/");// save a cookie
}
if (!$locale && isSet($_COOKIE["locale"])){
$locale = $_COOKIE["locale"];
}
//$locale="el_EL";
putenv("LC_ALL=$locale");//needed on some systems
putenv("LANGUAGE=$locale");//needed on some systems
setlocale(LC_ALL, $locale);

bindtextdomain("messages", ($_SESSION['directory_name'].'/locale/'));
bind_textdomain_codeset("messages", "UTF-8");
textdomain("messages");
    
?> 


