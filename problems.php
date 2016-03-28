<?php
session_start();



if( ($_SESSION['valid_user']=="") || ($_SESSION['auth'] == "unauthorised") ){
      header('Location: logout.php'); 
}	
else{
	
session_register("techlogin_session");
session_register("putmail_session");
session_register("name_session");
  
require ('configs/config.inc.php');
require ('Libs/common.lib.php');
connectDB();

if (($C1=="ON")){
  $urgent=1;}
  
  else{
  $urgent=0;} 

if (($P1=="ON")){
  $private=1;}
  
  else{
  $private=0;} 

function Correct($aString)
{
// This function correct the single,double quote problem by replacing all occurences

$temp=str_replace("\"","\"\"",$aString);
$aString=str_replace("'","''",$temp);
} 


// This function adds a new record in the problems table

function InsertInDb($name,$email,$subject,$descr,$urgent,$private, $done)
{

$today = date("Y-m-d");
$month = date("m");
$wra = date('H:i:s');

//$name=Sanitized($name);//Prevent SQL injection
//$subject=Sanitized($subject);//Prevent SQL injection
//$descr=Sanitized($descr);//Prevent SQL injection

//$name=SanitizedXSS($name);//Prevent XSS Scripting
//$subject=SanitizedXSS($subject);//Prevent SQL injection
//$descr=SanitizedXSS($descr);//Prevent SQL injection

$mySQL="INSERT INTO problems (indate,intime, name, email, subject, descr, urgency, private) VALUES ('$today','".$wra."','".$name."','".$email."','".addslashes($subject)."','".addslashes(nl2br($descr))."','".$urgent."', '".$private."') ";
mysql_query($mySQL);
error();
} 


function GetMaxProblemId()
{

$mySQL="select max(problemid) from problems ";
$rstemp_query=mysql_query($mySQL);  
$rstemp=mysql_fetch_array($rstemp_query);
$max=$rstemp[0];
$rstemp=null;
return $max;
} 


$done=1;
$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$descr=$_POST["descr"];
$urgent=$_POST["C1"];
$private=$_POST["P1"]; 


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

InsertInDb($name,$email,$subject,$descr,$urgent,$private,$done);
$problemid=GetMaxProblemId();

  if (($urgent==1)&&($done==1))
  {
	
	
  
//   mail('support@cs.ucy.ac.cy', "----------Request-Helpdesk-------".$problemid, $name."  has insert an URGENT request with the subject  ".$subject." ----Description---:  ".$descr,"From:$email");
$bold= '<font><b>';
$endbold='</b></font>';
$break= '<br>';
$html= '<html><head><title>Helpdesk email answer</title></head><body>';
$html_end= '</body></html>';
$message = '<a href=http://'.$_SERVER['HTTP_HOST'].'/subjectview4.php?which='.$problemid.'>Helpdesk.cs.ucy.ac.cy</a>';


$headers = 'From:' .$email . "\r\n" .
           'Reply-To:' .$email . "\r\n" .
		   'Return-Path:' .$email . "\r\n" .
		   'Content-Type: text/html; charset=UTF-8'.  "\r\n" .
		   'X-CSatUCY-From:' .$email . "\r\n" .
           'X-Mailer: PHP/' . phpversion();


mail('support@cs.ucy.ac.cy', "---Urgent Helpdesk Request No:".$problemid."---", $html.$name."  has insert an URGENT request with the subject:  ".$bold.$subject.$endbold."".$break.$break." ----------Description----------".$break.$descr.$break.$break.$break."Visit this request at: ".$message.$html_end, $headers);
}
  
$main="<META HTTP-EQUIV='refresh' content='0;URL=";
//if ((($urgent==1) && ($done==1)))
//{
//
// //GetMaxProblemId($max);
//  $wtarget=$main."solved_pending.php"."'>";
//  echo $wtarget;
//}
//  else
//if ((($urgent==0) && ($done==1)))
//{
//  $then;
//  $wtarget=$main."solved_pending.php"."'>";
//  echo $wtarget;
//}
//  else
//{
//
//// do nothing
//
//} 
$wtarget=$main."subjectview4.php?which=".$problemid."'>"; 
echo $wtarget;



}
?>

