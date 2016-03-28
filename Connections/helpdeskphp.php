<?php
$database_helpdeskphp = "helpdesk";
$username_helpdeskphp = "helpadmin";
$password_helpdeskphp = "PmBDRE3pajcjVPP4";
//(strncmp ($_SERVER["HTTP_HOST"],"testing", 7)== 0) ? $hostname_helpdeskphp = "localhost:3306" : $hostname_helpdeskphp = "dbserver:3306";
$hostname_helpdeskphp = "dbserver:3306";

//$helpdeskphp = mysql_connect($hostname_helpdeskphp, $username_helpdeskphp, $password_helpdeskphp) or trigger_error(mysql_error(),E_USER_ERROR);
$helpdeskphp = mysql_pconnect($hostname_helpdeskphp, $username_helpdeskphp, $password_helpdeskphp) or trigger_error(mysql_error(),E_USER_ERROR);


if (!empty($helpdeskphp)){

mysql_select_db($database_helpdeskphp, $helpdeskphp) or die ("Cannot select $database_helpdeskphp". mysql_errno());;
mysql_query("SET NAMES utf8");
}
?>
