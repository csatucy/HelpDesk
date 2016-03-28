<?php session_start();
(strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
?>

<?php include_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php');  ?>
<?php //include_once(($_SESSION['directory_name'].'/auth_functions.php'));
include_once(($_SESSION['directory_name'].'/configs/config.inc.php'));

include_once(($_SESSION['directory_name'].'/Libs/common.lib.php'));
connectDB();
error();
$text=$_POST["text"];

$mySQLx="select max(problemid) from problems "; 

$rstempx_query=mysql_query($mySQLx);  
error();
$rstempx=@mysql_fetch_array($rstempx_query);
$max=$rstempx[0];
  echo ("rstempx:".$max);
  echo $text;
										 $main="<META HTTP-EQUIV='refresh' content='0;URL=";
  $wtarget=$main."See_Problem.php"."'>"; 
  echo $wtarget;
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


</head>

<body>
<small>
<input name="max" type="hidden" id="max" value="<?php echo $max; ?>">
</small>
</body>
</html>
