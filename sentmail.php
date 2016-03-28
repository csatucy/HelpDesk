<?php
  session_start();
 (strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
require_once(($_SESSION['directory_name'].'/configs/config.inc.php'));
require_once($_SESSION['directory_name'].'/Libs/common.lib.php');
require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php'); 
connectDB();
 

function Correct($aString)
{
// This function correct the single,double quote problem by replacing all occurences

$temp=str_replace("\"","\"\"",$aString);
$aString=str_replace("'","''",$temp);
} 


$problemid=$_POST["problemid"]; 
$email=$_POST["email"]; 
$name=$_POST["name"];
$toemail=$_POST["toemail"];
$brief=$_POST["brief"];

Correct($email);
Correct($name);
Correct($toemail);
Correct($brief);

$query_Allid = "SELECT * FROM problems WHERE problemid =$problemid";
$Allid = mysql_query($query_Allid, $helpdeskphp);
 $row_Allid = mysql_fetch_assoc($Allid);
$totalRows_Allid = mysql_num_rows($Allid);

//$headers="From: $email \r\n";
//$headers .= "Content-Type: text/html; charset=UTF-8\n";

$headers = 'From:' .$email . "\r\n" .
           'Reply-To:' .$email . "\r\n" .
                   'Return-Path:' .$email . "\r\n" .
                   'Content-Type: text/html; charset=UTF-8'.  "\r\n" .
                   'X-CSatUCY-From:' .$email . "\r\n" .
           'X-Mailer: PHP/' . phpversion();



$subject=$row_Allid['subject'];

$break= '<br>';
$message = '<a href=http://'.$_SERVER['HTTP_HOST'].'/subjectview4.php?which='.$problemid.'>Helpdesk.cs.ucy.ac.cy</a>';
//$message = '<a href="http://'.$_SERVER['HTTP_HOST'].'/phpHelpDesk/subjectview4.php?which='.$problemid.'>Helpdesk.cs.ucy.ac.cy</a>';


mail($toemail,$row_Allid['subject']."--Helpdesk Request No".$row_Allid['problemid'],$name." has sent to you the above helpdesk request with the message:".$break."".$brief."".$break."----------------------Helpdesk system description of problem---------------------------".$break."".$row_Allid['descr']."".$break."".$break."View this request at: ".$message,$headers, "-f".$email );









$main="<META HTTP-EQUIV='refresh' content='1;URL=";

  $then;
  $wtarget=$main."solved_pending.php"."'>";
  echo $wtarget;
?>

<br>
<br>
<br>
<br>
<table border="0" width="585" align="center" height="8%">
  <tr>
    <td width="579" height="47" align="center" bgcolor="#663300" >
        <font face="Arial" align="center" color="#FFFFFF" size="4"><b>Sent Mail  - Confirmation</b></font></td>
  </tr>

  <tr>
    <td height="9" align="center" valign="center"><table border="0" width="579" valign="center" align="center" height="23%">
      
      <tr>
        <td align="center" valign="center"><p><font face="arial" color="black" size="3"><b>Your friend  notified by email. . . </b></font> <font size="3"> </font></p>
            </td>
      </tr>
      <tr>
        <td height="21" align="center" valign="center"><font face="arial" color="black" size="3"><b>Autoredirection in progress . . .</b></font> </td>
      </tr>
    </table>	</td>
</tr>
 <tr>
    <td width="579" align="center" bgcolor="#663300" height="3">  </tr>

</table>

</body>
</html>
