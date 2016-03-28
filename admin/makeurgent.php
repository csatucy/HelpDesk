<?php  session_start();
 (strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
require_once(($_SESSION['directory_name'].'/configs/config.inc.php'));
require_once($_SESSION['directory_name'].'/Libs/common.lib.php');
require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php'); 
if (!$_SESSION['valid_tech'])
  {header("Location: ../login.php"); }
  else {
  
connectDB();
$problemID=$_POST['problemID'];
$Urg=$_POST['Urg'];
$urgency=$_POST['urgency'];

if (($Urg=="ON")&&(($urgency=="0")|($urgency=="1")))
{
$mySQL="UPDATE problems SET urgency=2 WHERE problemid=".$problemID;
$rstemp5query=mysql_query($mySQL);  
$rstemp5=@mysql_fetch_array($rstemp5query);
} 

else if (($Urg=="ON")&&($urgency=="2"))
{
$mySQL1="UPDATE problems SET urgency=0 WHERE problemid=".$problemID;
$rstempquery=mysql_query($mySQL1);  
$rstemp=@mysql_fetch_array($rstempquery);}
}


$main="<META HTTP-EQUIV='refresh' content='0;URL=";

  $wtarget=$main."../solved_pending.php"."'>";
  echo $wtarget;


?>
