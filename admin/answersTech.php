<?php  session_start();
 
if (!$_SESSION['valid_tech'])
  {header("Location: ../login.php"); }//login_answer.php
  else {
	  //-----------------------------------------------------------------------------------------------------------------------
	 // (strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
	  
	   require_once(($_SESSION['directory_name'].'/configs/config.inc.php'));
       require_once($_SESSION['directory_name'].'/Libs/common.lib.php');
       require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php'); 

	  //---------------------------------------------------------------------------------
  connectDB();

$problemID=$_POST['problemID'];
$problemid=$_POST['problemID'];
$mail=$_SESSION['valid_user']."@cs.ucy.ac.cy"; 
$mySQL2="SELECT * FROM technicians" ;
$mySQL2=$mySQL2." WHERE techemail='".$mail."'";

$rstemp4_query=mysql_query($mySQL2);  
$rstemp4=@mysql_fetch_array($rstemp4_query);
//$techname=$rstemp4["techname"];

function Correct($aString)
{
// This function correct the single,double quote problem by replacing all occurences

$temp=str_replace("\"","\"\"",$aString);
$aString=str_replace("'","''",$temp);
} 

// This function adds a new record in the problems table

function InsertInDB($problemID, $descr,$email,$techname, $done)

{

$today = date("Y-m-d");
$wra = date('H:i:s');

$mySQL="INSERT INTO answers (problemid,techdescr,techemail,indate_ans,intime_ans,name_ans) VALUES ('".$problemID."', '".addslashes(nl2br($descr))."', '".$email."', '$today', '".$wra."','".$techname."') ";

mysql_query($mySQL);
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
$email2=$_POST['email2']; 
$techdescr=$_POST['descr'];
$techemail=$_POST['email'];
$techname=$_POST['techname'];

Correct($problemID);
Correct($descr);
Correct($email);

$techdescr = preg_replace('/<p[^>]*>/', '', $techdescr); // Remove the start <p> or <p attr="">
$techdescr = preg_replace('/<\/p>/', '<br />', $techdescr); // Replace the end



// add a new record in database

InsertInDb($problemid, $techdescr, $techemail,$techname, $done);

$R1=$_POST['R1'];
$auto=$_POST['auto'];

$mySee="select max(answerid) from answers ";
$rstempsee_query=mysql_query($mySee);  
$rstempsee=mysql_fetch_array($rstempsee_query);
$max=$rstempsee[0];
$rstempsee=null;

$mySQL="UPDATE problems SET solvedstate=$max WHERE problemid=".$problemID;
$mySQL2="UPDATE problems SET solvedstate=0 WHERE problemid=".$problemID;

$mySQL5="UPDATE problems SET assigned=1 WHERE problemid=".$problemID." ";


$mySQL6="INSERT INTO assigned (problemid,techname,Name,email) VALUES ";
$mySQL6=$mySQL6."('".$problemID."','".$techname."','$valid_tech','".$email."')";

$mySQL8="SELECT * FROM problems where problemid=".$problemID;


if ($auto=="ON")
{

  echo "<center><font color='red'><b>Problem: ".$problemID.", assigned to ".$email."</b></font></center><br><br>";
$rstemp5_query=mysql_query($mySQL5);  
$rstemp5=@mysql_fetch_array($rstemp5_query);
$rstemp6_query=mysql_query($mySQL6);  
$rstemp6=@mysql_fetch_array($rstemp6_query);
$rstemp4_query=mysql_query($mySQL2);  
$rstemp4=@mysql_fetch_array($rstemp4_query);

} 

//if solved


if (($R1=="1"))
{

  $state=1;
  $rstemp2_query=mysql_query($mySQL);  
$rstemp2=@mysql_fetch_array($rstemp2_query);

}
  else
{

  $state=0;
   $rstemp22_query=mysql_query($mySQL2);  
$rstemp22=@mysql_fetch_array($rstemp2_query); 

} 


$query_Allid = "SELECT * FROM problems WHERE problemid =" .$problemID; 
$Allid = mysql_query($query_Allid);
$row_Allid = mysql_fetch_assoc($Allid);
$totalRows_Allid = mysql_num_rows($Allid); 

$query_Allans = "SELECT * FROM answers WHERE problemid =" .$problemID." ORDER BY answerid DESC";
$Allans = mysql_query($query_Allans);
$row_Allans = mysql_fetch_array($Allans);
$bold= '<font><b>';
$endbold='</b></font>';
$break= '<br>';
$count=0;
while(!$row_Allans==0)
{

$count=$count+1;
$id=$row_Allans["answerid"];
$name=$row_Allans["name_ans"];
$techemail2=$row_Allans["techemail"];
$subject=$row_Allans["subject"];
$indate=$row_Allans["indate_ans"];
$descr=$row_Allans["techdescr"];
$row_Allans=mysql_fetch_array($Allans); 
$full_ans=$full_ans."".$break."".$descr."".$break."by ".$name."--".$indate."".$break."_______________________________________________________________________________________";
}
  
$Allans = mysql_query($query_Allans);
$row_Allans = mysql_fetch_assoc($Allans);
$html= '<html><body>';
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



mail($email2,

"HelpDesk System - You have an answer for request number: ".$problemid,

"".$html."".$techname." has answered helpdesk request No ".$problemid."".$break."------------------------------------------------------------------------------------------------".$break."--Description of the request--".$break."".$bold."".$row_Allid['subject']."".$break."".$row_Allid['descr']."".$endbold."".$break."_______________________________________________________________________________________".$break."".$bold."--Answers(latest first)--".$endbold."".$break."_______________________________________________________________________________________".$break."".$full_ans."".$break."".$break."View this request at: ".$message."".$html_end, $headers, "-f".$techemail); 
  
  
 
 
   /*  mail('andrim@cs.ucy.ac.cy', "----------Request-Helpdesk-------".$problemid, $techname."  has answered your helpdesk request No  ".$problemid."
    
  ----Answer---:".$techdescr,"From:$techemail");  */
  
  
/* $headers="From: $techemail \r\n"; 
$headers .= "Content-Type: text/html; charset=UTF-8\n";

mail($email2, "----------Request-Helpdesk-------".$problemid, $techname."  has answered your helpdesk request No  ".$problemid." 
   
   
----Answer---:\n".$techdescr,$headers); 
*/  
  

$main="<META HTTP-EQUIV='refresh' content='0;URL=";

  $then;
  $wtarget=$main."../solved_pending.php"."'>";
  echo $wtarget;
}


?>
