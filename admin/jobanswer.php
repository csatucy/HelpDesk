<?php session_start();
 
 (strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
  require_once(($_SESSION['directory_name'].'/configs/config.inc.php'));
require_once($_SESSION['directory_name'].'/Libs/common.lib.php');
?>
<?php require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php'); 

if (!$_SESSION['valid_tech'])
  {header("Location: ../login.php"); }
  else {
  connectDB();

$jobID=$_POST['jobID'];
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

function InsertInDB($jobID, $descr,$email,$techname, $done)

{

$today = date("Y-m-d");


$mySQL="INSERT INTO jobsanswers (jobid,techdescr,techemail, indate_ans, name_ans) VALUES ('".$jobID."', '".addslashes(nl2br($descr))."', '".$email."', '$today', '".$techname."') ";


mysql_query($mySQL);
error();
} 


function GetMaxProblemId($max)
{
$mySQL="select max(id) from answers ";
$rstemp_query=mysql_query($mySQL);  
$rstemp=mysql_fetch_array($rstemp_query);
$max=$rstemp[0];
$rstemp=null;
} 


$done=1;
$email=$_POST['email']; 
$email2=$_POST['email2']; 
$techdescr=$_POST['descr'];
$techemail=$_POST['email'];
$techname=$_POST['techname'];

Correct($jobID);
Correct($descr);
Correct($email);

$techdescr = preg_replace('/<p[^>]*>/', '', $techdescr); // Remove the start <p> or <p attr="">
$techdescr = preg_replace('/<\/p>/', '<br />', $techdescr); // Replace the end

// add a new record in database

InsertInDb($jobID, $techdescr, $techemail,$techname, $done);

$R1=$_POST['R1'];
$auto=$_POST['auto'];

$mySee="select max(id) from jobsanswers ";
$rstempsee_query=mysql_query($mySee);  
$rstempsee=mysql_fetch_array($rstempsee_query);
$max=$rstempsee[0];

$rstempsee=null;

$mySQL="UPDATE jobs SET solvedstate=$max WHERE jobid=".$jobID;
$mySQL2="UPDATE jobs SET solvedstate=0 WHERE jobid=".$jobID;
$mySQL5="UPDATE jobs SET assigned=1 WHERE jobid=".$jobID." ";


$mySQL6="INSERT INTO jobsassigned (jobid,techname,Name,email) VALUES ";
$mySQL6=$mySQL6."('".$jobID."','".$techname."','$valid_tech','".$email."')";

$mySQL8="SELECT * FROM jobs where jobid=".$jobID;


if ($auto=="ON")
{

  echo "<center><font color='red'><b>Problem: ".$jobID.", assigned to ".$email."</b></font></center><br><br>";
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
  echo $mySQL;
$rstemp2=@mysql_fetch_array($rstemp2_query);

}
  else
{

  $state=0;
   $rstemp22_query=mysql_query($mySQL2);  
$rstemp22=@mysql_fetch_array($rstemp2_query); 

} 


 

   /*  mail('andrim@cs.ucy.ac.cy', "----------Request-Helpdesk-------".$problemid, $techname."  has answered your helpdesk request No  ".$problemid."
  
  
  
  
  
  ----Answer---:".$techdescr,"From:$techemail");  */
  
  $query_Allid = "SELECT * FROM jobs WHERE jobid =$jobID"; 
$Allid = mysql_query($query_Allid, $helpdeskphp);
 $row_Allid = mysql_fetch_assoc($Allid);
$totalRows_Allid = mysql_num_rows($Allid); 

$break= '<br>';


  $message = '<a href=http://'.$_SERVER['HTTP_HOST'].'/admin/jobview.php?which='.$jobID.'>Helpdesk.cs.ucy.ac.cy</a>';
$subject=$row_Allid['subject'];

$headers = 'From:' .$techemail . "\r\n" .
           'Reply-To:' .$techemail . "\r\n" .
		   'Return-Path:' .$techemail . "\r\n" .
		   'Content-Type: text/html; charset=UTF-8'.  "\r\n" .
		   'X-CSatUCY-From:' .$techemail . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

//$headers="From: $techemail \r\n"; 
//$headers .= "Content-Type: text/html; charset=UTF-8\n";


/*mail($email2,
$row_Allid['subject']."--Helpdesk Request No".$row_Allid['jobID'],

$name." has sent to you the above helpdesk request with the message:".$break."".$brief."".$break."----------------------Helpdesk system description of problem---------------------------".$break."".$row_Allid['descr']."".$break."".$break."Visit this request at: ".$message,

$headers  );
*/



mail($email2,

"HelpDesk System - You have an answer for a Task number: ".$jobID,

"--Description of the task--".$break."".$row_Allid['subject']."".$break."".$break."".$techname." has answered your task No ".$jobID."".$break."--Answer--".$techdescr."".$break."View this request at: ".$message,
 
 $headers, "-f".$techemail); 

  

$main="<META HTTP-EQUIV='refresh' content='0;URL=";

  $then;
 
 if ($_SESSION['valid_admin']){

  $wtarget=$main."tasks_pending.php"."'>";}
  
  else if ($_SESSION['valid_tech'])
  {$wtarget=$main."techtesting.php"."'>";}

 echo $wtarget;
}


?>
</body>
</html>
