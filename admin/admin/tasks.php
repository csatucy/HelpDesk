<?php session_start();
  if (!$_SESSION['valid_admin'])
    {header("Location: ./index.php"); }
    else 
	{
	
session_register("techlogin_session");
session_register("putmail_session");
session_register("name_session");
  
require ('../../configs/config.inc.php');
require ('../../Libs/common.lib.php');
connectDB();

?>
<?php if (($C1=="ON"))
{

  $urgent=1;
  
}
  else
{

  $urgent=0;
} 

function Correct($aString)
{
// This function correct the single,double quote problem by replacing all occurences

$temp=str_replace("\"","\"\"",$aString);
$aString=str_replace("'","''",$temp);
} 


// This function adds a new record in the problems table

function InsertInDb($name,$email,$subject,$descr,$urgent,$done)
{

$today = date("Y-m-d");
$month = date("m");
echo $today, $month;

$mySQL="INSERT INTO jobs (indate, name, email, subject, descr, urgency) VALUES ('$today', '".$name."','".$email."','".addslashes($subject)."','".addslashes(nl2br($descr))."','".$urgent."') ";
mysql_query($mySQL);
error();
} 


function InsertAssigned($tech,$id,$name,$email)
{

$mySQL2="INSERT INTO jobsassigned (techname, jobid, name, email) VALUES ( '".$tech."','".$id."','".$name."','".$email."') ";
$mySQL3="UPDATE `jobs` SET `assigned` ='1' WHERE `jobid`= '".$id."' ";
mysql_query($mySQL2);
mysql_query($mySQL3);
error();
} 


function YesOrNo($urgent)
{

  if (($urgent==0))
  {
    echo "<img src='pictures/no.gif'>";
  }
    else
  {
    echo "<img src='pictures/yes.gif'>";
  } 
} 

function YesOrNo2($urgent,$done)
{
  if ((($urgent==1) && ($done==1)))
  {
    echo "<img src='pictures/yes.gif'>";
  }
    else
  {
    echo "<img src='pictures/no.gif'>";
  } 

} 


$done=1;
$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$descr=$_POST["descr"];
$urgent=$_POST["C1"];
$tech=$_POST["Tech"];
//echo $tech;
//echo $name;
//echo $email;



$mySQL3="SELECT * from `technicians` where `techid`='".$tech."'" or die(mysql_error());
$query=mysql_query($mySQL3);  
$rstemp3=mysql_fetch_array($query);
$techname=$rstemp3["techname"];
$techmail=$rstemp3["techemail"];
//echo $techname;


$techlogin="techlogin";
if (strlen($techlogin)==0)
{
 
  $email_session=$email;
  $name_session=$name;
} 


Correct($name);
Correct($email);
Correct($subject);
Correct($descr);

$descr = preg_replace('/<p[^>]*>/', '', $descr); // Remove the start <p> or <p attr="">
$descr = preg_replace('/<\/p>/', '<br />', $descr); // Replace the end


InsertInDb($name,$email,$subject,$descr,$urgent,$done);
$mySQL = 'select max(jobid) from jobs'. ' ';
$rstemp_query=mysql_query($mySQL);  
$jobID=mysql_result($rstemp_query,0,0);
//echo $jobID;

$adminname=$_SESSION['valid_admin'];
InsertAssigned($techname,$jobID,$adminname,$techmail);

// See if email must be sent to administrator
 
 // if (($urgent==1)&&($done==1))
 // {
  
   // mail('support@cs.ucy.ac.cy', "----------Request-Helpdesk-------".$problemid, $name."  has insert an URGENT request with the subject  ".$subject."
  
//  ----Description---:
  
 // ".$descr,"From:$email");

//}
  
$main="<META HTTP-EQUIV='refresh' content='0;URL=";
if ((($urgent==1) && ($done==1)))
{

  GetMaxProblemId($max);
  echo "max".$max;
  //mail($toemail, $subject, $brief,  "From: $email");
 
 $wtarget=$main."../tasks_pending.php"."'>";
 echo $wtarget;
}
  else
if ((($urgent==0) && ($done==1)))
{
  $then;
  $wtarget=$main."../tasks_pending.php"."'>";
  echo $wtarget;
}
  else
{

echo "Error. Request not compleated correctly.  Please contact administrator.";
} 
$bold= '<font><b>';
$endbold='</font></b>';
$break= '<br>';


$message = '<a href=http://'.$_SERVER['HTTP_HOST'].'/admin/jobview.php?which='.$jobID.'>Helpdesk.cs.ucy.ac.cy</a>';

//$headers="From: $email \r\n"; 
//$headers .= "Content-Type: text/html; charset=UTF-8\n";

$headers = 'From:' .$email . "\r\n" .
           'Reply-To:' .$email . "\r\n" .
		   'Return-Path:' .$email . "\r\n" .
		   'Content-Type: text/html; charset=UTF-8'.  "\r\n" .
	   'X-CSatUCY-From:' .$email . "\r\n" .
           'X-Mailer: PHP/' . phpversion();


//mail($techmail, "HelpDesk System - You have a new task assigned: ".$jobID, "--Description of the task--".$break."".$bold."".$subject."".$break."".$descr."".$endbold."".$break."_______________________________________________________________________________________".$break."".$bold."".$break."".$break."Visit this task at: ".$message,  $headers, "-fhelpdesk@cs.ucy.ac.cy"); 

mail($techmail, "HelpDesk System - You have a new task assigned: ".$jobID, "--Description of the task--".$break."".$bold."".$subject."".$break."".$descr."".$endbold."".$break."_______________________________________________________________________________________".$break."".$bold."".$break."".$break."Visit this task at: ".$message,  $headers, "-f".$email);

  

}
?>
</body>
</html>

