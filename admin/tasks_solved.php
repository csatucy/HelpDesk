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
      
      <!-- InstanceBeginEditable name="EditRegion1" -->
<?php
      if (!$_SESSION['valid_tech'])
	{ $main="<META HTTP-EQUIV='refresh' content='0;URL=";
    $wtarget=$main."../index.php"."'>";
    echo $wtarget;
	 
     }
    else  
	{     
    ?>
<form method="post">
  <table border="0" width="100%" cellspacing="0" cellpadding="0" >
  <tr class="back">
    <td  align="center" >
        <font size="4" face="Arial" align="center"><b>
        <?php
 $counter=$_POST["counter"];
  $sentid=$_POST["sentid"];
  $how=$_POST["how"];


$mySQL="select * from jobs, jobsanswers where jobs.solvedstate=jobsanswers.id AND jobs.jobid=jobsanswers.jobid ";

$menu_sort=$_POST['menu_sort'];
$menu_sort2=$_POST['menu_sort2'];
$menu=$_POST['menu'];
$menu1=$_POST['menu1'];
$menu2=$_POST['menu2'];
 
 if (($menu_sort==0)&&($menu_sort2==0) )
     {$mySQL=$mySQL." ORDER BY jobs.jobid  DESC";}
   
if (($menu_sort==0)&&($menu_sort2==1) )                         //by id
     {$mySQL=$mySQL." ORDER BY jobs.jobid  ASC";}
    
if (($menu_sort==1) &&($menu_sort2==1) )                    //by urgency state
    {$mySQL=$mySQL." ORDER BY jobs.urgency  ASC ";}
	 
if (($menu_sort==1) &&($menu_sort2==0) )
     {$mySQL=$mySQL." ORDER BY jobs.urgency  DESC";}
  
if (($menu_sort==2) &&($menu_sort2==1) )                     //by topic/subject
     {$mySQL=$mySQL." ORDER BY jobs.subject  ASC";}
      if (($menu_sort==2) &&($menu_sort2==0) )
     {$mySQL=$mySQL." ORDER BY jobs.subject  DESC";}
  
    if (($menu_sort==3) &&($menu_sort2==1) )                  //by originator
     {$mySQL=$mySQL." ORDER BY jobs.name  ASC";}
      if (($menu_sort==3) &&($menu_sort2==0) )
     {$mySQL=$mySQL." ORDER BY jobs.name DESC";}
  
   if (($menu_sort==4) &&($menu_sort2==1) )                  //by date
     {$mySQL=$mySQL." ORDER BY jobs.indate  ASC";}
      if (($menu_sort==4) &&($menu_sort2==0) )
     {$mySQL=$mySQL." ORDER BY jobs.indate DESC";}

   if (($menu_sort==5) &&($menu_sort2==1) )                  //by date
     {$mySQL=$mySQL."  ORDER BY jobsanswers.id ASC ";}
      if (($menu_sort==5) &&($menu_sort2==0) )
     {$mySQL=$mySQL." ORDER BY jobsanswers.id DESC ";}

 /*   if (($menu_sort==5) &&($menu_sort2==1) )                  //by date
     {$mySQL=$mySQL." ORDER BY jobsanswers.id ASC";}
      if (($menu_sort==5) &&($menu_sort2==0) )
     {$mySQL=$mySQL." ORDER BY jobsanswers.id DESC";}
 */
$IDfield="jobid";
$scriptresponder="jobview.php";

if ($menu2==0)   {   $how=30;}
if ($menu2==1)   {   $how=50;}
if ($menu2==2)   {   $how=100;}
if ($menu2==3)   {   $how=250;}
if ($menu2==4)   {   $how=400;}     
if ($menu2==5)   {   $how=700;}
if ($menu2==6)   {   $how=1000;}
 
if ($menu1==1)     {  $sentid=$sentid+1;}
if ($menu1==2)     {  $sentid=$sentid-1;}
if ($menu1==3)     {  $sentid=0; $counter=0;}
if ($menu1==4)     {header("Location: ./solved_pending.php"); }
if ($menu1==5)    {header("Location: ./index.php"); }
  
?>
<a name="topi" id="topi"></a><span class="text_header"><?php echo _("Directory of All the Solved Tasks");?></span></b></font></td>
  </tr>
  <tr>
      <td  align="center" bgcolor="#F1F2F6"  valign="top"><div align="left"><font size="1" face="Arial" class="text"><?php echo _("This is an archive of all solved tasks. You can navigate through the archive with the forward and backward options available from the menu."); ?> 
                                  </font>
      </div></td>
  </tr>
  <!--#EAF5FF -->
  <tr>
  	 <td width="100%" height="18"  align="right" bgcolor="#CCCC99"><table width="100%" border="0" bgcolor="#FFEEDD">
       <tr>
         <td><div align="center" class="sidebardk style1">
             
             <span class="text_header">
             <?php //$mynum2=$sentid*$how;
$mynum=$how+$sentid30; 
$rstemp_query=mysql_query($mySQL);
$rstemp=@mysql_fetch_array($rstemp_query);
$count2=1;
$sentid30=$sentid*$how;
$nextid=$sentid+1;

while((!(($rstemp==0)) && ($count2<($sentid30))))
{
  $rstemp=mysql_fetch_array($rstemp_query);
  $count2=$count2+1;
} 

?>
             <font face="arial"><b><?php echo _("Last "); echo $sentid30; ?>-<? echo $mynum+$sentid30; 
			  
			  echo _(" Solved Tasks")?></b></font> </span></div></td>
       </tr>
       <tr>
         <td bgcolor="#E4E4CB"><div align="center" class="sidebarlt"><span class="style16 text"><strong><span class="text">
         
           
           <input name="counter" type="hidden" id="counter" value="<? echo $counter; ?>" />
           
           <input name="sentid" type="hidden" id="sentid" value="<? echo $sentid; ?>" />
         
           <input name="how" type="hidden" id="how" value="<? echo $how; ?>" />
          <?php echo _("Sort by"); ?>:</span></strong></span>
		   
               <select name="menu_sort" class="text" id="menu_sort" >
                   <option value="0" <?php if (empty($_POST["menu_sort"])) {echo(" selected");} ?>><?php echo _("No"); ?></option>
                   <option value="1"<?php if ($_POST["menu_sort"]=="1"){ echo (" selected");}?>><?php echo _("State"); ?></option>
                   <option value="2"<?php if ($_POST["menu_sort"]=="2"){ echo (" selected");}?>><?php echo _("Topic"); ?></option>
                   <option value="3"<?php if ($_POST["menu_sort"]=="3"){ echo (" selected");}?>><?php echo _("Originator"); ?></option>
                   <option value="4"<?php if ($_POST["menu_sort"]=="4"){ echo (" selected");}?>><?php echo _("Date Reported"); ?></option>
                   <option value="5" <?php if ($_POST["menu_sort"]=="5"){ echo (" selected");}?>><?php echo _("Date Solved"); ?></option>
               </select>
               <select name="menu_sort2" class="text" id="menu_sort2">
                   <option value="1"<?php if ($_POST["menu_sort2"]=="1"){ echo (" selected");}?>><?php echo _("Ascending"); ?></option>
                   <option value="0" <?php if (empty($_POST["menu_sort2"])){ echo (" selected");}?>><?php echo _("Decending"); ?></option>
               </select>
               <span class="text"><strong><?php echo _("No Per page"); ?> :</strong></span>
               <select name="menu2" class="text" onchange="" valign="bottom">
                   <option value="0" <?php if (empty($_POST["menu2"])){ echo (" selected");}?>>- <?php echo _("Default 30"); ?> - </option>
                   <option value="1"<?php if ($_POST["menu2"]=="1"){ echo (" selected");}?>>- <?php echo _("50"); ?> - </option>
                   <option value="2"<?php if ($_POST["menu2"]=="2"){ echo (" selected");}?>>- <?php echo _("100"); ?> - </option>
                   <option value="3"<?php if ($_POST["menu2"]=="3"){ echo (" selected");}?>>-<?php echo _("250"); ?>-</option>
                   <option value="4"<?php if ($_POST["menu2"]=="4"){ echo (" selected");}?>>-<?php echo _("400"); ?>-</option>
                   <option value="5"<?php if ($_POST["menu2"]=="5"){ echo (" selected");}?>>-<?php echo _("700"); ?>-</option>
                   <option value="6"<?php if ($_POST["menu2"]=="6"){ echo (" selected");}?>>-<?php echo _("1000"); ?>-</option>
               </select>
               <select name="menu1" class="text" onchange="" valign="bottom">
                   <option value="0">- <?php echo _("Options"); ?> - </option>
                   <option value="1"><?php echo _("Next "); ?> <? echo $how; ?> <?php echo _(" Solved"); ?> </option>
                   <option value="2"><?php echo _("Previous "); ?> <? echo $how; ?> <?php echo _(" Solved"); ?> </option>
                   <? if (!($sentid==0)){ ?>
                   <option value="3"><?php echo _("Go to Start"); ?> </option>
                   <option value="4"><?php echo _("Request "); ?>
                   
                   &amp; <?php echo _("jobsanswers Table"); ?></option>
                   <? } ?>
                   <option value="5"><?php echo _("Exit"); ?></option>
               </select>
               <input name="Submit" type="submit" value="<?php echo _("Go"); ?>" />
              </div></td>
       </tr>
     </table></td>
  </tr>
</table>			   
<br />
          <table width="100%" height="12%" border="0" >
<tr class="textintence" >
                <td width="5%" height="100%" class="sidebardk" ><?php echo _("No");?></td>
               <td width="7%" height="100%" align="center" class="sidebardk"><?php echo _("State");?></td>
               <td width="32%"  height="100%" class="sidebardk"><?php echo _("Topic");?> </td>
               <td width="19%"  height="100%" class="sidebardk" ><?php echo _("Originator");?></td>
               <td width="9%"  height="100%" align="center" class="sidebardk"><?php echo _("Date");?></td>
            <td width="28%"  height="100%" class="sidebardk"><?php echo _("Replies From");?></td>
          </tr>          <? // Now lets grab all the records

$problemid=0;
$counr=$count+1;
$counter=0;
while(!($rstemp==0) && ($count<=$how))//+$count
{
  $count=$count+1;
  $problemid2=$rstemp["jobid"];

  $form_subject=$rstemp["subject"];
  $form_indate=$rstemp["indate"];
  $form_name=$rstemp["name"];
  $urgency=$rstemp["urgency"];
  $problemid=$problemid2;
  $private=$rstemp["private"];
  $user=$rstemp["email"];

  $mySQLreplies="select * from jobsanswers ";
  $mySQLreplies=$mySQLreplies."where jobid=".$problemid;
  $mySQLreplies=$mySQLreplies." ORDER BY id DESC";

  $mySQLstate="select * from jobsanswers ";
  $mySQLstate=$mySQLstate."where jobid=".$problemid;
  $mySQLstate=$mySQLstate." ORDER BY id DESC";

$rsReplies_query=mysql_query($mySQLreplies);  
error();
$rsReplies=mysql_fetch_array($rsReplies_query);
$rsstate_query=mysql_query($mySQLstate);  
$rsstate=mysql_fetch_array($rsstate_query);

 if (!$count==0)
  {
   $username= ($_SESSION['valid_user']);


if (($username."@cs.ucy.ac.cy")==$user) 
{$author=1;}
else
{$author=0;}


/*if (
(($private=="1")&&($author=="1"))||
(($private=="1")&&($_SESSION['valid_tech']))||
($private=="0")
)
{*/
  
?>
          <tr valign="middle" bgcolor="#F7F9D9">
	        <td height="100%" align="center" class="sidebarlt"> <? echo $problemid2; ?> </td>
            <td height="100%" align="center" class="sidebarlt">
            <? 
    $flag2=0;
    $statemen=1;
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
	
	
	
	
	if ($statemen=="0")
	     {
     	  echo "<img  src='../pictures/closed.gif'>";
	   } 
	   
	      if ($statemen=="1") 
    {
      	  echo "<img  src='../pictures/yellockfolder.gif'>";
    } 
	 
	
	
		  
	   if ($urgency=="1")  
	  {

      echo "<img src='../pictures/hot.gif' >";
	}
	 if ($urgency=="2")
	
    {
       echo "<img  src='../pictures/urgent.gif' >";
    } 
	if ($private=="1")
	
    {
       echo "<img  src='../pictures/private.gif' >";
    } 
	
		
 
	
	    
?>          </td>
          <td height="100%" align="left" class="sidebarlt"><? $my_link=$scriptresponder."?which=".$rstemp[$IDfield]; ?> <a href="<? echo $my_link; ?>">
                <?     echo $form_subject; ?>  </a>
            <a href="<? echo $my_link; ?>"> </a>  <a href="<? echo $my_link; ?>">  </a></td>
            <td height="100%" class="sidebarlt" align="left"><? echo $form_name; ?> </td>
            <td height="100%" class="sidebarlt" align="center"> <? echo $form_indate; ?> </td>
          <td height="100%" class="sidebarlt" align="left">
                <?     $flag=0;
    $countH=0;
while(!($rsReplies==0))
    {

      $flag=1;
      $reply_name=$rsReplies["name_ans"];
      $reply_email=$rsReplies["techemail"];
      $indate2=$rsReplies["indate_ans"];
      $theString=$reply_name.",".$indate2."<br>";
      $count2=0;
while(($countH>$count2))
      {

        $theString=" ".$theString;
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
 </td>
          </tr>
          <?   } 
  
$rstemp=mysql_fetch_array($rstemp_query);
} 
$rstemp_query=mysql_query($mySQL);
$rstemp=@mysql_fetch_array($rstemp_query);

$rstemp=null;

?>
        </table>
        <font face="Arial" align="center" color="#FFFFFF" size="4"></font>
</form>

      <p><br />
    <? if ($count==0)
{
?>
<strong><font color="#AA0000">No Solved tasks in the Archive<? } ?> </font></strong></p>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="navBar" >
  <tr>
    <td width="5%" align="left"  height="21">
       <a href="onlysolved.php#topi"><img src="../pictures/top.gif" width="14" height="10" border="0" /></a></td>
     <td width="88%" align="right"><div align="center" class="note"> <strong>
     
     
     
     <img src="../pictures/yellockfolder.gif" alt="yellockfolder.gif (917 bytes)" width="14"
    height="15" /> : <?php echo _("Solved Problems (Only technicians set problems to that state)"); ?><br />
         
            
       <img src="../pictures/closed.gif" alt="closed.gif (82 bytes)" width="14" height="11" />
            :
           
			<?php echo _("Problems that haven't been solved yet or pending problems"); ?><br />
        
            
       <img src="../pictures/hot.gif" width="15" height="15" alt="hot.bmp (206 bytes)" /> :  <?php echo _("Urgent Problems (by user)"); ?> <br />
       
       <img src="../pictures/urgent.gif" width="20" height="17"
    alt="hot.bmp (206 bytes)" />:<?php echo _("Extra Urgent Problem (by administrator)"); ?><br />
    
       <img src="../pictures/private.gif"  width="15" height="15" />:<?php echo _("Private Problems"); ?><br />   
    
    
    
    <a name="expl" id="expl"></a></strong></span></div></td>
     <td width="7%" align="right" height="21">
	        <a href="onlysolved.php#topi"><img src="../pictures/top.gif" width="14" height="10" border="0" /></a>     </td>
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
<!-- InstanceEnd --></html><?php }	 }  ?>
