<?php session_start(); 
 (strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
include_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php'); 
//include_once(($_SESSION['directory_name'].'/auth_functions.php'));
include_once(($_SESSION['directory_name'].'/configs/config.inc.php'));
include_once(($_SESSION['directory_name'].'/Libs/common.lib.php'));

connectDB(); 

$count=0;
$counter=4;

while ($counter<3645)
{
  $mySQL="SELECT * FROM answers, problems WHERE problems.problemid = answers.problemid AND problems.solvedstate <> 0 AND problems.problemid =$counter ORDER BY answers.answerid DESC  LIMIT 1  ";
    $counter=$counter+1;

$rstemp_query=mysql_query($mySQL);
$rstemp=mysql_fetch_array($rstemp_query);

while(!$rstemp==0)
{

$count=$count+1;
  $problemid=$rstemp["problemid"];echo $problemid; ?> &nbsp; <?php $answerid=$rstemp["answerid"];echo $answerid;
 
  $mySQL2="UPDATE problems SET solvedstate='".$answerid. "'";
$mySQL2=$mySQL2."  WHERE problems.problemid=".$problemid;
mysql_query($mySQL2);

  $rstemp=mysql_fetch_array($rstemp_query);
?> <br> <?php } 

$rstemp_query=mysql_query(($mySQL));
$rstemp=@mysql_fetch_array($rstemp_query);

$rstemp=null;} ?>

