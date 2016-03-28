<?php
  session_start();
  if (!$_SESSION['valid_user'])
    {header("Location: ./login.php"); }
    else 
	{
	(strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
require_once(($_SESSION['directory_name'].'/configs/config.inc.php'));
require_once($_SESSION['directory_name'].'/Libs/common.lib.php');
 require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php'); 
 
 connectDB();
//mysql_select_db($database_helpdeskphp, $helpdeskphp);

$email2=$_POST["email2"]; 

function Correct($aString)
{
// This function correct the single,double quote problem by replacing all occurences
$temp=str_replace("\"","\"\"",$aString);
$aString=str_replace("'","''",$temp);
} 



// This function adds a new record in the problems table

function InsertInDB($problemid, $techdescr,$techemail, $name, $done)

{

$today = date("Y-m-d");
$wra = date('H:i:s');

$mySQL="INSERT INTO answers (problemid,techdescr,techemail, indate_ans, intime_ans, name_ans) ".
    "VALUES ( '".$problemid."', '".addslashes(nl2br($techdescr))."','".$techemail."', '$today', '$wra','".$name."') ";
	
		//echo $mySQL;

mysql_query($mySQL);

$ChangeState="UPDATE `problems` SET `solvedstate` = '0' WHERE `problemid` =$problemid LIMIT 1 ";
mysql_query($ChangeState);

error();
} 

function GetMaxProblemId($max)
{

$mySQL="select max(answerid) from answers ";
$rstemp_query=mysql_query($mySQL);  
$rstemp=mysql_fetch_array($rstemp_query);

$max=$rstemp[0];
$rstemp=null;

} 

 
$done=1;
$name=($_POST["name"]);
$problemid=($_POST["problemid"]);
$techdescr=($_POST["techdescr"]);
$techemail=($_POST["techemail"]);
$techlogin="techlogin";
/*if (strlen($techlogin)==0)
{
  $email_session=$email;
  $name_session=$name;
} */
Correct($problemid);
Correct($techdescr);
Correct($techemail);
Correct($name);
// add a new record in database

$techdescr = preg_replace('/<p[^>]*>/', '', $techdescr); // Remove the start <p> or <p attr="">
$techdescr = preg_replace('/<\/p>/', '<br />', $techdescr); // Replace the end


InsertInDb($problemid, $techdescr, $techemail, $name, $done);

$query_Allid = "SELECT * FROM problems WHERE problemid =$problemid"; 
$Allid = mysql_query($query_Allid, $helpdeskphp);
$row_Allid = mysql_fetch_assoc($Allid);
$totalRows_Allid = mysql_num_rows($Allid); 

$query_Allans = "SELECT * FROM answers WHERE problemid =" .$problemid." ORDER BY answerid DESC";
$Allans = mysql_query($query_Allans);
$row_Allans = mysql_fetch_array($Allans);
$bold= '<font><b>';
$endbold='</b></font>';
$break= '<br>';
$html= '<html><head><title>Helpdesk email answer</title></head><body>';
$html_end= '</body></html>';
$message = '<a href=http://'.$_SERVER['HTTP_HOST'].'/subjectview4.php?which='.$problemid.'>Helpdesk.cs.ucy.ac.cy</a>';

//$headers="From: $techemail \r\n"; 
//$headers .= "Content-Type: text/html; charset=UTF-8\n";

$headers = 'From:' .$techemail . "\r\n" .
           'Reply-To:' .$techemail . "\r\n" .
		   'Return-Path:' .$techemail . "\r\n" .
		   'Content-Type: text/html; charset=UTF-8'. "\r\n" .
		   'X-CSatUCY-From:' .$techemail . "\r\n" .
           'X-Mailer: PHP/' . phpversion();


$count=0;
while(!$row_Allans==0)
{

$count=$count+1;
$name=$row_Allans["name_ans"];
$subject=$row_Allans["subject"];
$indate=$row_Allans["indate_ans"];
$descr=$row_Allans["techdescr"];
$techemail2=$row_Allans["techemail"];
$row_Allans=mysql_fetch_array($Allans); 
$full_ans=$full_ans."".$break."".$descr."".$break."by ".$name."--".$indate."".$break."_______________________________________________________________________________________";
if ($count==1)
{
$onoma=$name;
$newans=$descr;
$firstemail=$techemail2;
}


 if (strcasecmp($techemail2, $firstemail))
{
// print "The email addresses are NOT identical!\n \r";
/*echo "TEch ".$techemail;
echo "First ".$firstemail;
*/

mail($techemail2,

"HelpDesk System - Answer for request number: ".$problemid,

"".$html."".$onoma." has answered helpdesk request No ".$problemid."".$break."------------------------------------------------------------------------------------------------".$break."--Description of the request--".$break."".$bold."".$row_Allid['subject']."".$break."".$row_Allid['descr']."".$endbold."".$break."_______________________________________________________________________________________".$break."".$bold."Answer: ".$endbold."".$newans."".$break."_______________________________________________________________________________________".$break."Visit this request at: ".$message."".$html_end,$headers); 
}}

$Allans = mysql_query($query_Allans);
$row_Allans = mysql_fetch_assoc($Allans);





mail($email2,

"HelpDesk System - You have an answer for request number: ".$problemid,

"".$html."".$name." has answered helpdesk request No ".$problemid."".$break."------------------------------------------------------------------------------------------------".$break."--Description of the request--".$break."".$bold."".$row_Allid['subject']."".$break."".$row_Allid['descr']."".$endbold."".$break."_______________________________________________________________________________________".$break."".$bold."--Answers(latest first)--".$endbold."".$break."_______________________________________________________________________________________".$break."".$full_ans."".$break."".$break."Visit this request at: ".$message."".$html_end, $headers); 


 
$main="<META HTTP-EQUIV='refresh' content='0;URL=";

  $then;
  $wtarget=$main."solved_pending.php"."'>";
  echo $wtarget;

}

?>
</body>
</html>

