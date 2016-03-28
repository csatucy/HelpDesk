
<?php
// I18N support information here

$language = 'el_EL';
if (isSet($_GET["locale"])) $language = $_GET["locale"];
putenv("LANG=$language"); 
setlocale(LC_ALL, $language);

// Set the text domain as 'messages'
$domain = 'messages';
bindtextdomain("messages", "./locale");
//$path=$_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk/locale';
//bindtextdomain($domain, $path ); 
//echo $path;
textdomain($domain);

echo gettext("string");
?>