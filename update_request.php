<?php session_start();
  if (!$_SESSION['valid_user'])
    {header("Location: ./login.php"); }
    else 
	{
	
session_register("techlogin_session");
session_register("putmail_session");
session_register("name_session");
require ('configs/config.inc.php');
require ('Libs/common.lib.php');
connectDB();

function Correct($aString)
{
// This function correct the single,double quote problem by replacing all occurences

$temp=str_replace("\"","\"\"",$aString);
$aString=str_replace("'","''",$temp);
} 

// This function adds a new record in the problems table

function UpdateRequest($descr,$name,$subject, $problemid)
{


$mySQL="UPDATE `problems` SET `descr` = '".addslashes(nl2br($descr))."', `name` = '".$name."', `subject` = '".$subject."'  WHERE `problemid`=$problemid LIMIT 1 ";

mysql_query($mySQL);
error();
} 

function GetMaxProblemId($max)
{
$mySQL="select max(problemid) from problems ";
$rstemp_query=mysql_query($mySQL);  
$rstemp=@mysql_fetch_array($rstemp_query);
$max=$rstemp[0];
$rstemp=null;

} 

$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$descr=$_POST["descr"];
$urgent=$_POST["C1"];
$problemid=$_POST["problemid"];

$techlogin="techlogin";

$username= ($_SESSION['valid_user']);



if (($username."@cs.ucy.ac.cy")==$email) 
{ 
$author_ans=1;

}
else
{
$author_ans=0; 
header("Location: ./login.php"); }

if ($author_ans==1){



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


UpdateRequest($descr,$name, $subject,$problemid);
$main="<META HTTP-EQUIV='refresh' content='0;URL=";
$wtarget=$main."subjectview4.php?which=".$problemid."'>";
echo $wtarget;


}}?>

</body>
</html>

