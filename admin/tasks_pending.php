<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/techTemplate.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 
 session_start();
(strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/';
 session_start();
require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php');
require ($_SESSION['directory_name'].'/configs/config.inc.php');
require ($_SESSION['directory_name'].'/Libs/common.lib.php');
//include ($_SESSION['directory_name'].'/lang/en.inc.php');
//include ($_SESSION['directory_name'].'/lang/el.inc.php');
require($_SESSION['directory_name'].'/configs/localization.php');

connectDB();
error();

//$what=$_POST["what"];
$what=Sanitized($_POST["what"]);
$what=SanitizedXSS($_POST["what"]);
?>

<title>Help Desk - Get answers to your questions - v. <?php echo $VERSION; ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<style type="text/css" media="all">
<!--
@import url("../styles.css");
@import url("../andry_styles.css");
-->
</style>
<!--[if IE 5]>
<style type="text/css"> 
#outerWrapper #contentWrapper #leftColumn1 {
  width: 170px;
}
#outerWrapper #contentWrapper #rightColumn1 {
  width: 170px;
}
</style>
<![endif]-->
<!--[if IE]>
<style type="text/css"> 
#outerWrapper #contentWrapper #content-left, #outerWrapper #contentWrapper #content-right {
  zoom: 1;
}
</style>
<![endif]-->
<script type="text/javascript" src="../cssmenu.js"></script>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" media="all" href="cssmenu_ie.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="../cssmenu.css" />
</head>
<body>

  <div id="outerWrapper">
  
  <div class="sidebardk" id="headlinks">
    <div align="center"><span class="titlosGrante"><br />
      Helpdesk v.<?php echo $VERSION;?></span><br />
    </div><br />
    <div align="right"><span class="titlos"><?php echo _("University of Cyprus - Department of Computer Science"); ?></span><br />
    </div>
  </div>  
 
 
 
 
 <div id="topNavigation">
    
    <ul class="level-0" id="cssmw" >
      <li><span><a href="../index.php"><?php echo _("Home"); ?></a></span></li>
      <li><span><a href="../announcements/announcements.php" ><?php echo _("Announcements"); ?> </a></span></li>
      <li><span><a href="http://its.cs.ucy.ac.cy/guides" target="Help" ><?php echo _("User Guides"); ?> </a></span>
        <ul class="level-1">
         <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/newuserguide.pdf" target="Help"><?php echo _("New user guide"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/linux_and_freenx.pdf" target="Help"><?php echo _("Unix Labs & FreeNX"); ?> </a></span></li> 
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/vpn.pdf" target="Help"><?php echo _("VPN"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/email.pdf" target="Help"><?php echo _("Email"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/www.pdf" target="Help"><?php echo _("Web services"); ?> </a></span></li>
        </ul>
      <li><span><a href="../aliases.php" ><?php echo _("Email Aliases"); ?> </a></span></li>
              <li><span><a href="http://its.cs.ucy.ac.cy/" target="Help"><?php echo _("ITS WebSite"); ?> </a></span></li>
            
         

      <li><span><a href="http://its.cs.ucy.ac.cy/faqs" target="Help"><?php echo _("FAQs"); ?> </a></span></li>
      <li><span><a href="http://its.cs.ucy.ac.cy/contact/about" target="Help"><?php echo _("Contact Us"); ?> </a></span></li>
      
</ul>
    <script type="text/javascript">if(window.attachEvent) { window.attachEvent("onload", function() { cssmw.intializeMenu('cssmw'); }); } else if(window.addEventListener) { window.addEventListener("load", function() { cssmw.intializeMenu('cssmw'); }, true); }</script> 
  </div>
 
 <br>

  <div id="contentWrapper">
    <div id="leftColumn1">
      <div id="leftColumnContent">
        <div align="center"><img src="../pictures/cs_ucy-logo.png" width="159" height="32"  /> <br />
            <br />
        </div>
        <div class="sidebarbox">
          <div class="sidebarboxtop menu"> <?php echo _("Menu:"); ?><br />
          </div>
          <div class="sidebarboxbottom"></div>
        </div>
        <ul>
          <li><a href="../problem_out.php"><?php echo _("Enter Request"); ?> </a>          </li>
          <li><a href="../solved_pending.php"><?php echo _("Requests & Answers"); ?> </a></li>
          <li><a href="../onlysolved.php"><?php echo _("Solved Problems"); ?> </a></li>
          <li><a href="../Key.php"><?php echo _("Search"); ?><script language="JavaScript" type="text/javascript"><!--



function form1_Validator(theForm)
{ 
 
	 if (theForm.what.value.length <2)
  {
    alert("Please enter a value for the \"search term\" field. At least 2 chars.");
    theForm.what.focus();
    return (false);
  }   
  
  	 

  return (true);
 
}
//--></script><script language="JavaScript" type="text/javascript"><!--
function form1_Validator(theForm)
{ 
 
	 if (theForm.what.value.length <2)
  {
    alert("Please enter a value for the \"search term\" field. At least 2 chars.");
    theForm.what.focus();
    return (false);
  }   
  
  	 

  return (true);
 
}
//--></script></a></li>
          <li>
            <script language="JavaScript" type="text/javascript"><!--
function form1_Validator(theForm)
{ 
 
	 if (theForm.what.value.length <2)
  {
    alert("Please enter a value for the \"search term\" field. At least 2 chars.");
    theForm.what.focus();
    return (false);
  }   
  
  	 

  return (true);
 
}
//--></script>
           
<div align="left" class="sidebardk">
<form action="../Search.php" method="post" name="FrontPage_Fom3" class="sidebardk_noborder" id="FrontPage_Fom3" onsubmit="return form1_Validator(this)" >
                <label><?php echo _("Quick Search:"); ?></label>
                <input name="what" type="text" class="back" id="what" value="" size="10" />
                <br />
                <input type="submit" name="Submit" value="<?php echo _("Search"); ?>" />
                </form> 
                </div>
            
         
          </li>
        </ul>
        <?php if ($_SESSION['valid_tech'])
            {?>
        <div class="sidebarbox">
          <div class="sidebarboxtop menu"> <font size="4"> <?php echo _("Administration Menu:"); ?><br />
          </font> </div>
          <div class="sidebarboxbottom"></div>
        </div>
        <ul>
          <li><a href="techtesting.php"><?php echo _("Technichian Control"); ?></a></li>
                  <?php } ?>
          <?php if ($_SESSION['valid_admin'])
            {?>
          <li> <a href="admin.php"><?php echo _("Administrator Control"); ?> </a></li>
            <li> <a href="analytics.php"><?php echo _("Analytics"); ?> </a></li>
                 <?php } ?>
        </ul>
      </div>
    </div>
    	<table width="729" border="0">
      <tr>
        <td width="28" height="35"><span class="style12">
  <label></label><label></label>
        
         </span></td>
        <td width="64"><span class="style12">
<?php        $which=$_GET["which"]; ?>

         <a href="?which=<?php echo $which; ?>&locale=en_US"><img src="../pictures/en.gif" /></a>
           <a href="?which=<?php echo $which; ?>&locale=el_GR"><img src="../pictures/el.gif" /></a>         </td>
        <td width="154"></td>
        <td width="319"><div align="right"><span class="note">
          <?php  if ($_SESSION['valid_user'])
  {?>
            <em><strong><?php echo("  "); echo _("You are logged in as: "); echo($_SESSION['valid_user']);?></strong></em> 
          <?php }
  else
  {?>
          <em><strong><?php echo _("You are viewing this page as a guest"); echo($valid_user); ?></strong></em> 
          <?php }?>
        </span></div></td>
        <td width="36">&nbsp;</td>
        <td width="102">
        <?php  if ($_SESSION['valid_user'])
  {?>
<small><a href="../logout.php" class="sidebarlt"><?php echo _("Log Out"); ?></a></small><?php }  else { ?> <small><a href="../login.php" class="sidebarlt"><?php echo _("Login"); ?></a></small>

<?php }

?>        </td>
      </tr>
    </table>
    
    
    
    
    
    <div id="content-right">
      <h1><!-- InstanceBeginRepeat name="menu" --><!-- InstanceBeginRepeatEntry -->
	   <div align="center"><?php 
    
      
     if (!$_SESSION['valid_tech'])
	{ $main="<META HTTP-EQUIV='refresh' content='0;URL=";
    $wtarget=$main."../index.php"."'>";
    echo $wtarget;
	 
     }
    else  
	{     
	
	
    
         
	
	
$query_Allid="select * from technicians ";
$query_Allid=$query_Allid." ORDER BY technicians.techid"; //Epilegei olous tous technikous pou doulevoun akoma Working=1
$Allid = mysql_query($query_Allid, $helpdeskphp) or die(mysql_error()); //Me vasi to id tous
$row_Allid = mysql_fetch_assoc($Allid);
$totalRows_Allid = mysql_num_rows($Allid); 

$mySQLx="select * from problems ";
$mySQLx=$mySQLx."where assigned=0 AND solvedstate=0 ";


$rstempx_query=mysql_query($mySQLx);  
error();
$rstempx=mysql_fetch_array($rstempx_query);

/* $mySQLtech="select techname,techemail FROM technicians WHERE working=0";
$rstech_query=mysql_query($mySQLtech);  
error();
$rstech=mysql_fetch_array($rstech_query);
 */ 
  ?>
	    


         <span class="back" style="font-size: 24px">Welcome back <b><?php echo ($_SESSION['valid_tech']);?></b></font><font color="#800000" face="arial"><b>!</b></font>  Technicians Control Site</span><br />
         <br />
        </div>

      
       <table border="2" align="center" cellpadding="2" cellspacing="2" bordercolor="#00FFFF">
  <tr class="sidebardk_noborder_v2">
    <td ><a href="techunassigned.php"><?php echo _("Unassigned Problems Pool"); ?></a></td>
    <td ><a href="tasks_pending.php"><?php echo _("View All Tasks"); ?></a></td>
      <td ><a href="techtesting.php"><?php echo _("View All assigned to Me"); ?></a></td>
      <td ><a href="tasks_solved.php"><?php echo _("Solved Tasks"); ?></a></td>
    </tr>
</table>

	  
	  
	  <!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --></h1>
      
      <!-- InstanceBeginEditable name="EditRegion1" -->	<?php // session_start();
//(strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
//include_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php');  
//include_once(($_SESSION['directory_name'].'/auth_functions.php'));
//include_once(($_SESSION['directory_name'].'/configs/config.inc.php'));
//include_once(($_SESSION['directory_name'].'/Libs/common.lib.php'));
//connectDB();
//error();

$month = date("m");
$year = date("Y");

$today = date("Y-m-d");
$last2=$month-1;
$last=("$year-$last2-0");
$prev=12;
//Epilogh stoixeion gia ta problems pou den einai lymena kai sorting
$mySQL="select * from jobs where jobs.solvedstate=0 and (jobs.urgency=0 or jobs.urgency=1) ";
 if (($_GET['menu_sort']==0)&&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY jobs.jobid  DESC";}
   
if (($_GET['menu_sort']==0)&&($_GET['menu_sort2']==1) )                         //by id
     {$mySQL=$mySQL." ORDER BY jobs.jobid  ASC";}
    
if (($_GET['menu_sort']==1) &&($_GET['menu_sort2']==1) )                    //by urgency state
    {$mySQL=$mySQL." ORDER BY jobs.urgency  ASC ";}
	 
if (($_GET['menu_sort']==1) &&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY jobs.urgency  DESC";}
  
if (($_GET['menu_sort']==2) &&($_GET['menu_sort2']==1) )                     //by topic/subject
     {$mySQL=$mySQL." ORDER BY jobs.subject  ASC";}
      if (($_GET['menu_sort']==2) &&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY jobs.subject  DESC";}
  
    if (($_GET['menu_sort']==3) &&($_GET['menu_sort2']==1) )                  //by originator
     {$mySQL=$mySQL." ORDER BY jobs.name  ASC";}
      if (($_GET['menu_sort']==3) &&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY jobs.name DESC";}
  
   if (($_GET['menu_sort']==4) &&($_GET['menu_sort2']==1) )                  //by date
     {$mySQL=$mySQL." ORDER BY jobs.indate  ASC";}
      if (($_GET['menu_sort']==4) &&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY jobs.indate DESC";}
 															  
	$IDfield="jobid";
    $scriptresponder="jobview.php";
              
    $rstemp_query=mysql_query($mySQL);
    error();
    $rstemp=mysql_fetch_array($rstemp_query);
									

//Epilogh last 30 jobs solved
$mySQL2="SELECT * FROM jobsanswers, jobs WHERE jobs.jobid = jobsanswers.jobid AND jobs.solvedstate = jobsanswers.id
ORDER BY jobsanswers.id DESC LIMIT 0 , 30"; 
   $rstemp_query2=mysql_query($mySQL2);
    error();
   $rstemp2=mysql_fetch_array($rstemp_query2);

//Epilogh Admin_URGENT jobs 
$UrgentSQL="select * from jobs where jobs.urgency= 2 AND jobs.solvedstate=0 ORDER BY jobs.jobid DESC "; 
   $UrgentQuery=mysql_query($UrgentSQL);
    error();
   $Urg=mysql_fetch_array($UrgentQuery);


                                  
?>


			
			
<script language="JavaScript" type="text/javascript">
<!--
function buildArray()
{
	var a = buildArray.arguments;
	for (i=0; i<a.length; i++)
	{  this[i] = a[i]; }
	this.length = a.length;
}
     var urls1 = new buildArray("", "#solvedexpl","tasks_solved.php","#expl","index.php");

function go(which, num, win)
{
	n = which.selectedIndex;
	if (n != 0)
	{   
		var url = eval("urls" + num + "[n]")
 		location.href = url;
  	}
}
// -->
</script>

<link href="andry_styles.css" rel="stylesheet" type="text/css" />
      <a name="topi" id="topi"></a>
      <form>
      <table width="100%" border="0" bgcolor="#FFEEDD" >
                   
         <tr class="tasks_sidebar" >
	        <td height="100%" colspan="6" align="center"><span class="text_header">Tasks &amp; Answers Internal Page</td>
	      </tr>
		   <tr class="logo" style="font-size: 70%" >
	         <td height="100%" colspan="6">This page displays problems and requests that are still pending. To see the solved problems, or the explanation of the icons, select the appropriate option from the menu below.</td>
          </tr>
		  <?php if (!$Urg==0) { ?>
        			    
		     <tr class="textintence" >
		       <td height="100%" colspan="6" class="fieldbg style1"><div align="center" class="highlight"><span class="style21" style="color: #333333">EXTRA URGENT TASKS</span></div></td>
	         </tr>
			   
		     <tr  class="tasks_menu" >
               <td width="5%" height="100%"  >No</td>
               <td width="5%" height="100%" align="center" >State</td>
               <td width="32%"  height="100%">Topic</td>
                <td width="19%"  height="100%" >Originator</td>
                <td width="10%"  height="100%" align="center" >Date</td>
               <td width="29%"  height="100%">Replies From</td>
          </tr>
		
		  <?php // Now lets grab all the records gia ta urgent by administrator problems
$count=0;
while(!$Urg==0)
{
$count=$count+1;
  $id=$Urg["jobid"];
  $form_subject1=$Urg["subject"];
  $form_indate1=$Urg["indate"];
  $form_name1=$Urg["name"];
  $urgency1=$Urg["urgency"];

  $mySQLreplies1="select * from jobsanswers where jobid=$id ORDER BY id DESC";
  $mySQLstate1="select * from jobs where jobid=$id ORDER BY id DESC";
 
$rsReplies_query1=mysql_query($mySQLreplies1);  
error();
$rsReplies1=mysql_fetch_array($rsReplies_query1);
$rsstate_query1=mysql_query($mySQLstate1);  
$rsstate1=@mysql_fetch_array($rsstate_query1);

?>
              <tr  bgcolor="#F7F9D9">
                <td height="20" align="center" class="sidebarlt"><small>
                  <?php echo $id; ?>
                </small></td>
                <td  height="20" align="center" class="sidebarlt"><?php $flag2=0;
    $statement=0;
while(!($rsstate==0))
    {
      if ($flag2==0)
      {
        $statement=$rsstate["solvedstate"];
        $tech=$rsstate["techname"];
        $flag2=1;
      } 
      $rsstate=mysql_fetch_array($rsstate_query);
    } 
	  if ($urgency1=="2")
	
    {
       echo "<img  src='../pictures/urgent.gif' >";
    } 

    if ($statement=="0")
	     {
     	  echo "<img  src='../pictures/closed.gif' >";
	   } 
	  
	   if ($urgency1=="1")  
	  {

      echo "<img src='../pictures/hot.gif' >";
	}
	
	 
	?></td>
                <td height="20" valign="middle" bgcolor="#FFFFCC" class="sidebarlt"><div align="left">
                  <?php $my_link=$scriptresponder."?which=".$Urg["jobid"]; ?>
                  <small><a href="<?php echo $my_link; ?>">
                    <?php echo $form_subject1; ?>
                  </a></small></div></td>
                <td  height="20" align="left"  bgcolor="#FFFFCC" class="sidebarlt"><small>
                  <?php echo $form_name1; ?>
                </small></td>
                <td height="20" align="center" valign="middel"  class="sidebarlt"><small>
                  <?php echo $form_indate1; ?>
                </small></td>
                <td height="20" class="sidebarlt"align="left" style="font-size: small"><span class="text" style="font-size: small"><small>
                  <?php $flag=0;
    $countH=0;
while(!($rsReplies1==0))
    {

      $flag=1;
      $reply_name1=$rsReplies1["name_ans"];
      $reply_email=$rsReplies1["techemail"];
      $indate2=$rsReplies1["indate_ans"];
	  $theString=    $reply_name1.",".$indate2."<br>";
      $count2=0;
while(($countH>$count2))
      {

        $theString="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$theString;
        $count2=$count2+1;
      } 
      $countH=$countH+1;
      echo $theString;

      $rsReplies1=mysql_fetch_array($rsReplies_query1);

    } 
    if ($flag==0)
    {

      echo "<center><font color='#AA0000'>No Answer</font></center>";
    } 
              
 $Urg=mysql_fetch_array($UrgentQuery);
} 

  $UrgentQuery=mysql_query($UrgentSQL);
  $Urg=mysql_fetch_array($UrgentQuery);

$Urg=null;

 
?>
                </small></span></td>
              </tr>
		       
                 <tr bgcolor="#FFFFFF">
                <td height="8" colspan="6" align="center" bgcolor="#FFFFFF" >&nbsp;</td>
          </tr>
          
          <?php
          } 
?>
          
              <tr  >
                <td height="20" colspan="3" align="center" class="back"><span class="style5"><span class="style16 text"><strong><span class="text">Sort by:</span></strong></span>
                    <select name="menu_sort" class="text" id="menu_sort" >
                      <option value="0" <?php if (empty($_GET["menu_sort"])) {echo(" selected");} ?>>No</option>
                      <option value="1"<?php if ($_GET["menu_sort"]=="1"){ echo (" selected");}?>>State</option>
                      <option value="2"<?php if ($_GET["menu_sort"]=="2"){ echo (" selected");}?>>Topic</option>
                      <option value="3"<?php if ($_GET["menu_sort"]=="3"){ echo (" selected");}?>>Originator</option>
                      <option value="4"<?php if ($_GET["menu_sort"]=="4"){ echo (" selected");}?>>Date</option>
                    </select>
                    <select name="menu_sort2" class="text" id="menu_sort2">
                      <option value="1"<?php if ($_GET["menu_sort2"]){ echo (" selected");}?>>Ascending</option>
                      <option value="0" <?php if (empty($_GET["menu_sort2"])){ echo (" selected");}?>>Decending</option>
                    </select>
                    <input name="Submit2" type="submit" value="Go"session_register(="session_register(""how />
                </span></td>
                <td height="20" colspan="2" class="back" align="left"><b>PENDING TASKS</b></td>
                <td height="20" align="center" class="back"><span class="style5"><span class="text">
                  <select name="menu1" onchange="go(this, 1, false)" valign="bottom">
                    <option selected="selected"> - Options - </option>
                    <option>Last 30 Tasks completed </option>
                    <option>All tasks Completed</option>
                    <option>Explanation of Icons&nbsp;</option>
                    <option>Exit</option>
                </select>
                </span></span></td>
              </tr>
    </table> 
	
<table width="100%" border="0">
            <tr>
              <td><table width="100%"  border="0" >
              <tr class="tasks_menu">
                    <td width="5%" height="100%" >No</td>
                  <td width="5%" height="100%" align="center" >State</td>
                    <td width="32%"  height="100%">Topic </td>
                  <td width="19%"  height="100%" >Originator</td>
                  <td width="11%"  height="100%" align="center">Date</td>
                  <td width="28%"  height="100%" >Replies From</td>
                </tr>
                  <?php // Now lets grab all the records gia ta unsolved problems
$count=0;
while(!$rstemp==0)
{

$count=$count+1;
  $id1=$rstemp["jobid"];
  $form_subject=$rstemp["subject"];
  $form_indate=$rstemp["indate"];
  $form_name=$rstemp["name"];
  $urgency=$rstemp["urgency"];


  $mySQLreplies="select * from jobsanswers ";
  $mySQLreplies=$mySQLreplies."where jobid=".$id1 ;
  $mySQLreplies=$mySQLreplies." ORDER BY id DESC"; 


  $mySQLstate="select * from jobs ";
  $mySQLstate=$mySQLstate."where jobid=".$id1;
$mySQLstate=$mySQLstate." ORDER BY id DESC";

$rsReplies_query=mysql_query($mySQLreplies);  
error();
$rsReplies=mysql_fetch_array($rsReplies_query);
$rsstate_query=mysql_query($mySQLstate);  
$rsstate=@mysql_fetch_array($rsstate_query);

?>
                  <tr  bgcolor="#F7F9D9">
                    <td height="20" align="center" class="sidebarlt"><small><?php echo $id1; ?></small></td>
                    <td  height="20" align="center" class="sidebarlt"><?php $flag2=0;
    $statement=0;
while(!($rsstate==0))
    {
      if ($flag2==0)
      {
        $statement=$rsstate["solvedstate"];
        $tech=$rsstate["techname"];
        $flag2=1;
      } 
      $rsstate=mysql_fetch_array($rsstate_query);
    } 
 if ($urgency=="2")
	
    {
       echo "<img  src='../pictures/urgent.gif' >";
    } 

    if ($statement=="0" && $urgency=="1")
    {
      echo "<img src='../pictures/hot.gif' >";
	  echo "<img  src='../pictures/closed.gif' ";
	   } 
	  
	   if ((!$statement=="0") && $urgency=="1")  
	  {

      echo "<img src='../pictures/hot.gif' >";
	  echo "<img  src='../pictures/yellockfolder.gif'>";	   } 
	
	     if ((!$statement=="0") && !$urgency=="1")
	  {

   
	  echo "<img  src='../pictures/yellockfolder.gif' >";	   } 

    if ($statement=="0" && !$urgency=="1")
	
    {
    
      echo "<img  src='../pictures/closed.gif'>";
    } 


?></td>
                    <td height="20" valign="middle" class="sidebarlt" ><div align="left">
                      <?php $my_link=$scriptresponder."?which=".$rstemp[$IDfield]; ?>
                      <small><a href="<?php echo $my_link; ?>">
                        <?php echo $form_subject; ?>
                      </a><a href="<?php echo $my_link; ?>"></a></small></div></td>
                    <td  height="20" align="left" class="sidebarlt"><small>
                      <?php echo $form_name; ?>
                    </small></td>
                    <td height="20" valign="middel"  class="sidebarlt"><small>
                      <?php echo $form_indate; ?>
                    </small></td>
                    <td height="20" class="sidebarlt"align="left" style="font-size: small"><span class="text" style="font-size: small"><small>
                      <?php $flag=0;
    $countH=0;
while(!($rsReplies==0))
    {

      $flag=1;
      $reply_name=$rsReplies["name_ans"];
      $reply_email=$rsReplies["techemail"];
      $indate2=$rsReplies["indate_ans"];
	  $theString=    $reply_name.",".$indate2."<br>";
      $count2=0;
while(($countH>$count2))
      {

        $theString="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$theString;
        $count2=$count2+1;
      } 
      $countH=$countH+1;
      echo $theString;

      $rsReplies=mysql_fetch_array($rsReplies_query);

    } 
    if ($flag==0)
    {

      echo "<center><font color='#AA0000'>No Answer</font></center>";
    } 

?>
                    </small></span></td>
                  </tr>
                  <?php $rstemp=mysql_fetch_array($rstemp_query);

} 

$rstemp_query=mysql_query(($mySQL));
$rstemp=mysql_fetch_array($rstemp_query);

$rstemp=null;


?>
                </table>
              <table width="100%" border="0"  >
<tr >
                      <td width="5%" height="21">&nbsp;</td>
                  <td width="5%" height="21" align="center">&nbsp;</td>
                  <td width="32%" height="21">&nbsp;</td>
                  <td width="19%" height="21">&nbsp;</td>
                  <td width="11%" height="21" align="center">&nbsp;</td>
                  <td width="28%" height="21"><a name="solvedexpl" id="solvedexpl"></a></td>
                </tr>
      
                    <tr class="tasks_sidebar" > 
 <td colspan="6"><div align="center"><span class="text_header">Last 30 solved tasks</strong></span><span class="note">(Sort default by date solved)</span></div></td>
 </tr>
                
                
                
                    <tr >
                      <td height="22">&nbsp;</td>
                      <td height="22" align="center">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                      <td height="22" align="center">&nbsp;</td>
                      <td height="22">&nbsp;</td>
                    </tr>
                    <tr class="tasks_menu">
                    <td width="5%" height="100%" >No</td>
                    <td width="5%" height="100%" align="center" >State</td>
                    <td width="32%"  height="100%">Topic </td>
                    <td width="19%"  height="100%" >Originator</td>
                    <td width="11%"  height="100%" align="center">Date</td>
                    <td width="28%"  height="100%" >Replies From</td>
</tr>
                    <?php // Now lets grab all the records for last 30 problems solved

$count=0;
while((!$rstemp2==0) && ($count<30))
 
{$count=$count+1;
$IDfield23="problemidd";
$scriptresponder="jobview.php";
                  
 $form_subject=$rstemp2["subject"];
  $form_indate=$rstemp2["indate"];
  $form_name=$rstemp2["name"];
  $urgency=$rstemp2["urgency"];
  
    $id=$rstemp2["jobid"];
  $mySQLreplies="select * from jobsanswers ";
  $mySQLreplies=$mySQLreplies."where jobid=".$id ;
  $mySQLreplies=$mySQLreplies." ORDER BY id DESC"; 

  $mySQLstate2="select * from jobs ";
  $mySQLstate2=$mySQLstate2."where jobid=".$id;
  $mySQLstate2=$mySQLstate2." ORDER BY id DESC";

$rsReplies_query=mysql_query($mySQLreplies);  
error();
$rsReplies=@mysql_fetch_array($rsReplies_query);
$rsstate_query2=mysql_query($mySQLstate2);  
$rsstate2=@mysql_fetch_array($rsstate_query2);



?>
                    <tr  bgcolor="#F7F9D9" class="textintence">
                      <td height="20" align="center" bgcolor="#F7F9D9" class="sidebarlt"><small>
                        <?php echo  $id; ?>
                      </small></td>
                      <td  height="20" align="center" bgcolor="#F7F9D9" class="sidebarlt"><?php $flag2=0;
   
while(!($rsstate2==0))
    {
      if ($flag2==0)
      {
        $statemen=$rsstate2["solvedstate"];
        $tech=$rsstate2["techname"];
        $flag2=1;
      } 
      $rsstate2=mysql_fetch_array($rsstate_query2);
    } 
if ($urgency=="2")
	
    {
       echo "<img  src='../pictures/urgent.gif' >";
    } 
     if ($urgency=="1") 
	  {
	  echo "<img  src='../pictures/hot.gif'>";	   } 
    

	   
	 if($statemen=="0") 
	  {
 	  echo "<img  src='../pictures/closed.gif'>";	   } 
	  
	 else
    {
     	  echo "<img  src='../pictures/yellockfolder.gif'>";
	  }
	
?></td>
                      <td height="20" valign="middle" bgcolor="#F7F9D9" class="sidebarlt" ><div align="left">
                        <?php $my_link=$scriptresponder."?which=".$rstemp2["jobid"]; ?>
                        <small><a href="<?php echo $my_link; ?>">
                        <?php echo $form_subject; ?>
                        </a></small>
                        <div align="left"></div>
                      </div></td>
                      <td  height="20" align="left" bgcolor="#F7F9D9" class="sidebarlt"><small>
                        <?php echo $form_name; ?>
                      </small></td>
                      <td height="20" align="center" valign="middel" bgcolor="#F7F9D9"  class="sidebarlt"><small>
                        <?php echo $form_indate; ?>
                      </small></td>
                      <td height="20"align="left" bgcolor="#F7F9D9" class="sidebarlt"><small> <?php $flag=0;
    $countH=0;
while(!($rsReplies==0))
    {

      $flag=1;
      $reply_name=$rsReplies["name_ans"];
      $reply_email=$rsReplies["techemail"];
      $indate2=$rsReplies["indate_ans"];
	  $theString=    $reply_name.",".$indate2."<br>";
      $count2=0;
while(($countH>$count2))
      {

        $theString="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$theString;
        $count2=$count2+1;
      } 
      $countH=$countH+1;
      echo $theString;

      $rsReplies=mysql_fetch_array($rsReplies_query);
    } 
    if ($flag==0)
    {
      echo "<center><font color='#AA0000'>No Answer</font></center>";
    } 
?></small></td>
                    </tr>
                    <?php /* } */
		  
		
		
$rstemp2=mysql_fetch_array($rstemp_query2);
}
$rstemp_query2=mysql_query(($mySQL2));
$rstemp2=@mysql_fetch_array($rstemp_query2);

$rstemp2=null; 


?>
                </table></td>
            </tr>
        </table>
        <br />
        <?php if ($count==0)
{
?>
  </form>

  <div align="center"><strong><font color="#AA0000">No problems reported in the above period<?php } ?></font></strong></div>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="navBar" >
    <tr>
      <td width="5%" align="left"  height="21"><a href="tasks_pending.php#topi"><img src="../pictures/top.gif" alt="top" width="14" height="10" border="0" /></a></td>
      <td width="88%" align="right"><div align="center" class="note"><strong><img src="../pictures/yellockfolder.gif" alt="yellockfolder.gif (917 bytes)" width="14"
    height="15" /> :<font face="Verdana, Arial, Helvetica, sans-serif"> Solved Problems (Only technicians set problems to that state)&nbsp;<br />
          </font><font face="Arial"><img
    src="../pictures/closed.gif" alt="closed.gif (82 bytes)" width="14" height="11" /> : <font face="Verdana, Arial, Helvetica, sans-serif"> Problems that haven't been solved yet or pending problems</font><br />
          </font><img src="../pictures/hot.gif" width="15" height="15"
    alt="hot.bmp (206 bytes)" /> : <font face="Verdana, Arial, Helvetica, sans-serif"> Urgent Problems (by user) <br />
      </font><img src="../pictures/urgent.gif" width="20" height="17"
    alt="hot.bmp (206 bytes)" /><font face="Verdana, Arial, Helvetica, sans-serif">Extra Urgent Problem (by administrator)<a name="expl" id="expl"></a></font></strong></div></td>
      <td width="7%" align="right" height="21"><a href="tasks_pending.php#topi"><img src="../pictures/top.gif" alt="top" width="14" height="10" border="0" /></a> </td>
    </tr>
  </table>
<!-- InstanceEndEditable --></div>
    <br class="clearFloat" />
  </div>
  <div id="footer">
    <p><a href="../index.php"><?php echo _("Home"); ?></a> | <a href="../announcements/announcements.php" ><?php echo _("Announcements"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/guides" target="Help" ><?php echo _("User Guides"); ?> </a> |<a href="../aliases.php" ><?php echo _("Email Aliases"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/" target="Help"><?php echo _("ITS WebSite"); ?> </a>| <a href="http://its.cs.ucy.ac.cy/faqs" target="Help"><?php echo _("FAQs"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/contact/about" target="Help"><?php echo _("Contact Us"); ?> </a> | <a href="../about.php" ><?php echo _("About"); ?> </a></p>
    <p>This site is copyright © 2013 The HelpDesk support Team<img src="http://www.justdreamweaver.com/templates/link/spacer.gif" width="1" /></p>
  </div>
  <!--The following code must be left in place and unaltered for free usage of this theme. If you wish to remove the links, contact us at http://www.justdreamweaver.com and get template pricing for a link-free template.-->
  <div id="credit">This <a href="http://www.justdreamweaver.com/dreamweaver-templates.html">free Dreamweaver template</a> created by <a href="http://www.justdreamweaver.com">JustDreamweaver.com</a></div>
</div>
</body>
<!-- InstanceEnd --></html><?php }?>
