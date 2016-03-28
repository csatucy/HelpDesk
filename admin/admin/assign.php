<?php session_start();
 (strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';

$_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/andrim/phpHelpDesk';
require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php');
require ($_SESSION['directory_name'].'/configs/config.inc.php');
require ($_SESSION['directory_name'].'/Libs/common.lib.php');
require($_SESSION['directory_name'].'/configs/localization.php');
connectDB();
error();

$valid_admin= $_SESSION['valid_admin'];
 
   if (!$_SESSION['valid_tech'])
    {header("Location:../../login.php"); }
    else   
	{

$problemid=$_POST["problemid"];
echo $problemid;
$id=$_POST["Tech"];
echo $id;

if (empty($id)) 
{

$mySQLx="SELECT * FROM technicians WHERE techlogin='".$valid_tech."' limit 1";
$rstempx_query=mysql_query($mySQLx);  
$rstempx=mysql_fetch_array($rstempx_query);
$id=$rstempx["techid"];

}

else {
$mySQL3="SELECT * from `technicians` where `techid`='".$id."'" or die(mysql_error());
$query=mysql_query($mySQL3);  
$rstemp3=mysql_fetch_array($query);
$techname=$rstemp3["techname"];
$email=$rstemp3["techemail"];
$name=$valid_admin;
  
$mySQL="UPDATE problems SET assigned=1";
$mySQL=$mySQL." WHERE problemid=".$problemid." ";

  
$mySQL2="INSERT INTO assigned (problemid,techname,name,email) VALUES ";
$mySQL2=$mySQL2."('".$problemid."','".$techname."','".$name."','".$email."')";

//displays a database field as a listbox
$rstempquery=mysql_query($mySQL);  
$rstemp=mysql_fetch_array($rstempquery);
$rstemp2query=mysql_query($mySQL2);  
$rstemp2=mysql_fetch_array($rstemp2query);

 
?>

<style type="text/css">
<!--
body {
	background-color: #FFFFCC;
}
-->
</style><body>

<p><br>
<br>
<?php echo "<p align='center'><big><font color='#800080'><strong>Problem ".$problemid." has been assigned to ".$techname."</strong></font></big></p>";

//} 

 if ($_SESSION['valid_admin'])
  echo "<META HTTP-EQUIV='refresh' content='0;URL=../admin.php'>";
else
 echo "<META HTTP-EQUIV='refresh' content='0;URL=../techunassigned.php'>";
}
}
?></p>
</body>

