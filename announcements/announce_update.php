<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php session_start();
require("../configs/config.inc.php"); 
require("../Libs/common.lib.php"); 

connectDB();

$done=1;
$authorname=$_POST["authorname"];
$authoremail=$_POST["authoremail"];
$subject=$_POST["subject"];
$body=$_POST["body"];



$subject = preg_replace('/<p[^>]*>/', '', $subject); // Remove the start <p> or <p attr="">
$subject = preg_replace('/<\/p>/', '<br />', $subject); // Replace the end

$body = preg_replace('/<p[^>]*>/', '', $body); // Remove the start <p> or <p attr="">
$body = preg_replace('/<\/p>/', '<br />', $body); // Replace the end


$Csall=$_POST["Csall"];
$maillist=$_POST['maillist'];
$csall_copia=$Csall;
//----------------------------------------------------------------------------------------
//Announce to whom
$maillist_copia=$maillist;

if(!empty($maillist_copia)){
   foreach($maillist_copia as $key => $value){
           $space=", ";
           $whom.=$value.$space;
   }
}

if(!empty($csall_copia)){
      $whom=$csall_copia;  
}

//---------------------------------------------------------------------------------------


$body_copia = str_replace("<br />","",$body);

//----------------------------------------------------------------------------------------

/* NSC 	The following variables are not needed anymore the $maillist table is used instead
$c1=$_POST["c1"];
$c2=$_POST["c2"];
$c3=$_POST["c3"];
$c4=$_POST["c4"];
$c5=$_POST["c5"];
$c6=$_POST["c6"]; */

// write cookie back - set session only if that is a normal user

$techlogin="techlogin";
if (strlen($techlogin)==0)
{
$_SESSION['email']=$_POST['authoremail'];
$_SESSION['name']=$_POST['authorname'];
}  

// **** HTML starts HERE ****** %>

// add a new record in database
$break= '<br>';
$html= '<html><body>';
$html_end= '</body></html>';
$message = '

<a href="http://'.$_SERVER['HTTP_HOST'].'/announcements/announcements.php>Helpdesk</a>';


$today = date("Ymd");
$trail2 =$html."Ανακοίνωση από το σύστημα ηλεκτρονικής βοήθειας (Helpdesk) του Τμήματος Πληροφορικής.".$break.
"This is a new announcement from the HelpDesk System of the Computer Science Department.
______________________________________________________________________________________________".$break.
"Η ανακοίνωση έγινε από: ".$authorname."".$break."
This announcement has been created by: ".$authorname."".$break."".$break.

"Θέμα/Subject: ".$subject." ".$break."";
$trail="-----------------------------------------------------------------------------------------------".$break.
"Αυτή η ανακοίνωση έχει επίσης τοποθετηθεί στο σύστημα ανακοινώσεων του Helpdesk όπου επίσης θα τοποθετηθούν και πιθανές ανανεώσεις της.".$break.
"This announcement has also been placed to the Helpdesk Announcement System where any renewals will also be placed.".$break."".$message."".$break."-----------------------------------------------------------------------------------------------".$html_end;
$subj="New Helpdesk Announcement";

$mySQL = "INSERT INTO announce (subject,author,sent_to,authoremail,indate,body,state) VALUES ('".$subject."','".$authorname."','".$whom."','".$authoremail."', '".$today."', '".nl2br($body_copia)."', \"active\" )";


//$headers="From: support@ \n"; 
//$headers.="Content-type: text/html; charset=utf-8\n";

$headers = 'From: support@ '. "\r\n" .
           'Reply-To: support@ '  . "\r\n" .
		   'Return-Path: support@ '  . "\r\n" .
		   'Content-Type: text/html; charset=UTF-8'. "\r\n" .
		   'X-CSatUCY-From: support@ ' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();


mysql_query($mySQL);
error();

if (!empty($Csall)){
//echo "<br>will email csall=".$Csall."<br>";
//mail($Csall, $subj.$subject, $trail2.$body.$trail, "From: support@ ");
mail($Csall, $subj, $trail2.$body.$trail, $headers, "-fsupport@ ");
}
	if (!empty($maillist)){
		foreach ($maillist as $key => $value) {
	//	$val=$val.", ".$value;} ;
		$val=$value;
			//mail($val, $subj.$subject, $trail2.$body.$trail, "From: support@ ");
			mail($val, $subj, $trail2.$body.$trail, $headers, "-fsupport@ ");

		}
	}
if ( !error() ) { 
	   echo "Email sent!! Redirecting back to announcements index."; 
	   echo "<font face=\"arial\" color=\"black\" size=\"2\"><br><b>Autoredirection in progress . . .</b></font>";


//Special case csall --NSC

//andrim if (!empty($Csall)){

//echo "<br>will email csall=".$Csall."<br>";
//mail($Csall, $subj.$subject, $trail2.$body.$trail, "From: support@ ");

//andrim mail($Csall, $subj.$subject, $trail2.$body.$trail, $headers);



/*mail("andrim@ ", $subj.$subject, $trail2.$body.$trail, $headers);*/



//andrim }
//andrim	if (!empty($maillist)){
//andrim		foreach ($maillist as $key => $value) {
	//	$val=$val.", ".$value;} ;
//andrim		$val=$value;
			//mail($val, $subj.$subject, $trail2.$body.$trail, "From: support@ ");
//andrim			mail($val, $subj.$subject, $trail2.$body.$trail, $headers);

		//andrim}
	//andrim}
?>
<title>Announcement Updating</title>
<br>If not redirected Automatically Click <a href="announcements.php">HERE</a>


<script language="javascript">
	window.location="announcements.php";
</script>

<?php

	exit();
}
  else
{

	echo "<font face=\"arial\" color=\"black\" size=\"2\"><b>Problem Occured ! - Notification wasn't sent!</b></font>";
}

?>
