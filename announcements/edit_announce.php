<?php session_start();
   include ($_SESSION['directory_name'].'/tinymce/tinyconfig.inc');
require_once("../security.php");
require("../configs/config.inc.php"); 
require("../Libs/common.lib.php"); 
$_SERVER['HTTP_REFERER']=$_SERVER['PHP_SELF'];
function Correct($aString)
{

  $temp=str_replace("\"","\"\"",$aString);
  $aString=str_replace("'","''",$temp);
} 

// This function adds a new record in the announce table
/*foreach ($_POST as $key => $value) {
echo "\$".$key." = \$_POST['".$key."']<br />";
}
echo "and now the GET <br />";

foreach ($_GET as $key => $value) {
echo "\$".$key." = \$_POST['".$key."']<br />";

}*/
$indate = $_POST['indate'];
$authorname = $_POST['authorname'];
$authoremail = $_POST['authoremail'];
$subject = $_POST['subject'];
$body = nl2br($_POST['body']);
$myid = $_GET['myid'];


echo "body=". $body;
echo "<br> orig body = ". $_POST['body'];

function UpdateInDB($name,$sent_to,$email,$subject,$indate,$descr,$done,$id)
{
echo "desc =".$descr."<br>";
echo "id = ".$id;
connectDB();
/*
echo $subject;
echo $body;
echo $indate;
*/
$descr=nl2br($descr);

$today = date("Ymd");
$state="active";
$mySQL="REPLACE announce VALUES ('$id', '$subject', '$name', '$sent_to', '$email', '$indate', '$descr', '$state', '$today' )";
echo $mySQL;
mysql_query($mySQL);
error();

  $Errorid=$Err;
  if (!($Errorid==0))
  {
    $done=0;
  }
} 

function YesOrNo($urgent)
{

  if (($urgent==0))
  {

    echo "<img src='../pictures/no.gif'>";
  }
    else
  {

    echo "<img src='../pictures/yes.gif'>";
  } 

} 

function YesOrNo2($urgent,$done)
{

  if ((($urgent==1) && ($done==1)))
  {

    echo "<img src='../pictures/yes.gif'>";
  }
    else
  {

    echo "<img src='../pictures/no.gif'>";
  } 

} 

function GetMaxProblemId($max)
{

connectDB();
$mySQL="select GREATEST(problemid) from problems ";
$rstemp_query=mysql_query($mySQL);  
error();
$rstemp=mysql_fetch_array($rstemp_query);
  $max=$rstemp[0];
  $rstemp=null;

  $conntemp=null;


} 
?>

<?php $done=1;
// retrieve sented variables
if (($_SESSION['valid_tech']) && ($_SERVER['REQUEST_METHOD']=="POST")){

$authorname=$_POST["authorname"];
$authoremail=$_POST["authoremail"];
$subject=$_POST["subject"];
$body=$_POST["body"];
$cal=$_POST["call"];
$indate=$_POST["indate"];
$sent_to=$_POST["sent_to"];
UpdateInDb($authorname,$sent_to,$authoremail,$subject,$indate,$body,$done,$myid);
}
?><title>Editing announcement</title>

<table border="0" width="579" align="center">
  <tr>
    <td width="575" align="center" bgcolor="#663300" height="21">
        <b>Update Announcement - Confirmation</b></td>
  </tr>

  <tr>
    <td align="center">
		
               <b>Announcement Updated on the Announcement Table . . . </b>
                   <?php YesOrNO($done); ?>
             </td>
           </tr>
				<?php // See if email must be sent to administrator

// NSC $main="<META HTTP-EQUIV='refresh' content='3;URL=";
if ($done)
{
?>
					   <tr>
					  		   		  <td align="center">
					  		   		    <b>Autoredirection in progress . . .</b>
					      		       </td>
           			 </tr>
           			 	
					 
<?php $myname=URLEncode($authorname);
  $mysubject=URLEncode($subject);
 
?>
<script type="text/javascript" language="javascript">
  window.location="announcements.php";
</script>

<br>If not redirected Automatically Click <a href="announcements.php">HERE</a>
<?php 
}
  else
{

?>
					   <tr>
					  	  <td align="center">
					  	    <b>Problem Occured ! - Notification wasn't sent!</b>
					      </td>
           			   </tr>
           			 
				  <tr>
					  <td width="575" align="center" bgcolor="#663300" height="21">&nbsp;</td>
				  </tr>
  				 </table>

<?php } ?>

</body>
</html>
