<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/adminTemplate.dwt" codeOutsideHTMLIsLocked="false" -->
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
      
	 <div align="center">
	    <span class="back" style="font-size: 24px">
<?php 
     if (!$_SESSION['valid_admin'])
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
	    
<span class="back" style="font-size: 24px">Administrators Control Site</span><br />
	  </div>

<table border="1" align="center" cellpadding="2" cellspacing="2" bordercolor="#00FFFF">
  <tr class="sidebardk_noborder_v2">
    <td ><a href="admin.php"  >Assign a problem</a></td>
    <td ><a href="admin/edittech.php"  >Edit Technicians </a></td>
    <td ><a href="admin/postdel.php"  >Remove a request</a></td>
    <td ><a href="admin/reassign_problem.php">Re-assign a problem </a></td>
    <td ><a href="tasks_pending.php"  >View all tasks</a></td>
    <td ><a href="admin/newtask.php"  >Enter new task</a></td>
    <td ><a href="techtesting.php"><?php echo _("View All assigned to Me"); ?></a></td>
     <td ><a href="analytics.php"><?php echo _("Analytics"); ?></a></td>
    </tr>
</table>

	  
	  
	  <!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --></h1>
      
    <!-- InstanceBeginEditable name="EditRegion1" -->
	
	
<p align="center"><span class="text_header"><font face="Arial">Unassigned Problems</font><b></span> 
  <?php 


  $IDfield="problemid";
  $scriptresponder="../subjectview4.php";



$rstempx_query=mysql_query($mySQLx);  
error();
$rstempx=mysql_fetch_array($rstempx_query);
?>
    </p>
<table width="100%" height="63" border="0" align="center">
        <tr align="center" valign="middle" class="sidebardk_noborder">
          <td width="5%" >No</td>
          <td width="5%" >State</td>
          <td width="22%" >Topic</td>
          <td width="11%" >Originator</td>
          <td width="11%" >Date</td>
          <td width="20%" >Replies From</td>
          <td width="26%">Assign to Tech</td>
        </tr>
        <?php // Now lets grab all the records

  $count=0;
while(!($rstempx==0))
  {
    $count=$count+1;
    $problemid=$rstempx["problemid"];
    $form_subject=$rstempx["subject"];
    $form_indate=$rstempx["indate"];
    $form_name=$rstempx["name"];
    $urgency=$rstempx["urgency"];

    $mySQLreplies="select * from answers ";
    $mySQLreplies=$mySQLreplies."where problemid=".$problemid;
    $mySQLreplies=$mySQLreplies." ORDER BY answerid DESC";

    $mySQLstate="select * from answers ";
    $mySQLstate=$mySQLstate."where problemid=".$problemid;
    $mySQLstate=$mySQLstate." ORDER BY answerid DESC";

$rsReplies_query=mysql_query($mySQLreplies);    
error();
$rsReplies=mysql_fetch_array($rsReplies_query);
$rsstate_query=mysql_query($mySQLstate);    
error();
$rsstate=mysql_fetch_array($rsstate_query);
?>
        <?php     if ($count==0)
    {

         }
      else
    {
?>
        <tr align="center" valign="middle" class="sidebarlt">
          <td  height="38" class="sidebarlt">
                  <?php       echo $problemid; ?>          </td>
        <td height="38" class="sidebarlt">
              <?php 
      $flag2=0;
      $statement=0;
while(!($rsstate==0))
      {
        if ($flag2==0)
        {
          $statement=$rsstate["solvedstate"];
          $tech=$rsstate["name"];
          $flag2=1;
        } 
       $rsstate=mysql_fetch_array($rsstate_query);
      } 
   if ($urgency=="1") 
      {

        echo "<img src='../pictures/hot.gif' alt='Urgent Problem! - Administrator notified via email' >";
      } 

 if ($urgency=="2") 
      {

        echo "<img src='../pictures/urgent.GIF' >";
      } 


       if ($statement=="0")
      {
	
  echo "<img  src='../pictures/closed.gif' alt='Pending or Unsolved by Technician' >";}
   
        else
        {
        $then;
        echo "<img  src='../pictures/closed.gif' alt='Pending or Unsolved by Technician' >";
      } 

?>          </td>
          <td  height="38" class="sidebarlt"><?php
		  $my_link=$scriptresponder."?which=".$rstempx[$IDfield]; ?>
            <a href="<?php       echo $my_link; ?>">
              <?php       echo $form_subject; ?>
            </a>  </td>
    <td height="38" class="sidebarlt">
                  <?php       echo $form_name; ?>           </td>
    <td  height="38" class="sidebarlt">
                  <?php       echo $form_indate; ?>        </td>
    <td  height="38" class="sidebarlt">
                  <?php       $flag=0;
while(!($rsReplies==0))
      {
        $flag=1;
        $reply_name=$rsReplies["name_ans"];
        $reply_email=$rsReplies["techemail"];
        $indate2=$rsReplies["indate_ans"];
        echo $reply_name.", ".$indate2."<br>";

        $rsReplies=mysql_fetch_array($rsReplies_query);

      } 
      if ($flag==0)
      {

        echo "<center><font color='#cc0000'>No Answer</font></center>";
      } 

?>
          </small></small> </td>
<td  height="38" class="sidebarlt" >

<form method="post" action="admin/assign.php?back=1">
           
      
   <select name="Tech" class="fieldbg" id="SelectTech">
            <option value="0">-Choose a technician-</option>
            <?php
do {  
?>
            <option value="<?php echo $row_Allid['techid']?>"><?php echo $row_Allid['techname'];?></option>
            <?php
} while ($row_Allid = mysql_fetch_assoc($Allid));
  $rows = mysql_num_rows($Allid);
  if($rows > 0) {
      mysql_data_seek($Allid, 0);
	  $row_Allid = mysql_fetch_assoc($Allid);
  }
?>
          </select>
             
                  <input type="submit" value="Assign" name="B1" />
                  <small>
                  <input type="hidden" name="problemid" value="<?php       echo $problemid; ?>" />
                  </small> </p>
          </form></td>
        </tr>
        <?php  } ?>
        <?php 
    $rstempx=mysql_fetch_array($rstempx_query);
  } 
$rstempx_query=mysql_query($mySQLx);  
error();
$rstempx=mysql_fetch_array($rstempx_query);
$rstempx=null;
?>
    </table>
<?php   if ($count==0)
  {
?>
<p align="center" class="error"><strong>All the problems reported , are assigned
  <?php   } ?> 
  </strong></p>

<hr align="center" />
<?php 
  $today=strftime("%Y-%m-%d");
  echo $today;
  $yesterday=strftime("%Y-%m-%d");

  $today2="#".$today."#";
  $yesterday2="#".$yesterday."#";
  $old=30/12/1899;

$mySQL="select * from problems ";
 $mySQL=$mySQL."where assigned=1 AND solvedstate=0 "; //Deixnei ta provlimata pou einai assign alla oxi solved
$mySQL=$mySQL." ORDER BY problemID ASC";
$IDfield="problemid";
$scriptresponder="../subjectview4.php";
$rstemp_query=mysql_query($mySQL);  
error();
$rstemp=mysql_fetch_array($rstemp_query);
$howmanyfields=$count-1;

//This displays the current month

?>

<p align="center" class="text_header"><font face="Arial"><strong>Assigned &amp; waiting for an
Answer</strong></font></p>
<table border="0" width="100%" align="center" >
  <tr class="sidebardk_noborder" >
    <td width="5%" >No</td>
    <td width="24%" >Date</td>
    <td width="27%" >Topic</td>
    <td width="18%" >Reported by</td>
    <td width="26%" >Assigned to</td>
  </tr>
  <?php  // Now lets grab all the records

  $count=0;
while(!($rstemp==0))
  {

    $count=$count+1;
    $problemid=$rstemp["problemid"];
    $form_subject=$rstemp["subject"];
    $form_indate=$rstemp["indate"];


    $mySQL5="select techname from assigned ";
    $mySQL5=$mySQL5."where problemid=".$problemid;
    $mySQL5=$mySQL5." GROUP BY name";

$Rsassigns_query=mysql_query($mySQL5);    
error();
$Rsassigns=mysql_fetch_array($Rsassigns_query);



$mySQL2="";
$mySQL2="select * from problems where problemid=".$problemid;
$rstemp2_query=mysql_query($mySQL2);    
error();
$rstemp2=mysql_fetch_array($rstemp2_query);
while(!($rstemp2==0))
    {
      $form_name=$rstemp2["name"];
      $rstemp2=mysql_fetch_array($rstemp2_query);
    } 
    $rstemp2=null;
    $form_assigned=$rstemp["name"];
?>
  <?php     if ($count==0)
    {
?>
  <?php     }
      else
    {
?>
  <tr align="center" valign="middle" class="sidebarlt">
    <td width="5%" height="35" nowrap="nowrap" class="sidebarlt" ><?php       echo $problemid; ?>    </td>
    <td width="24%" height="35" nowrap="nowrap" class="sidebarlt"><div align="center">
      <?php       echo $form_indate; ?>
    </div></td>
    <td "width="27%" height="35" nowrap="nowrap" class="sidebarlt"><?php       $my_link=$scriptresponder."?which=".$rstemp[$IDfield]; ?>
        <a href="<?php       echo $my_link; ?>"target="_blank">
          <?php       echo $form_subject; ?>
        </a>
        <div align="left"><small><a href="<?php  echo $my_link; ?>"target="_blank"> </a></small></div></td>
    <td width="18%" height="35" nowrap="nowrap" class="sidebarlt"><?php       echo $form_name; ?>    </td>
    <td width="26%" height="35" nowrap="nowrap" class="sidebarlt"><?php 
      $flag=0;
      while(!($Rsassigns==0))
      {

        $flag=1;
        $assign_name=$Rsassigns["techname"];
        //assign_name=rsAssigns("indate")

        echo $assign_name."<br>";//& ", " & indate2 & "<br>";
        $Rsassigns=mysql_fetch_array($Rsassigns_query);

      } 
      if ($flag==0)
      {
        echo "<center><font color='#800080'> Not Assigned </font></center>";
      } 
?>    </td>
  </tr>
  <?php  } ?>
  <?php 
    $rstemp=mysql_fetch_array($rstemp_query);
  } 
$rstemp_query=mysql_query($mySQL);  
error();
$rstemp=mysql_fetch_array($rstemp_query);
$rstemp=null;


?>
</table>
<p align="center" class="text_header">
  <?php   if (($count==0))
  {
?>
</p>

<p align="center" class="error"><strong>All the assigned problems have an answer.</p>
<?php   }   else
{
?>

<p align="center"><big><strong><big><span class="style1"><br />
  </span></big></strong></big>

  <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan -->
  
  <!--webbot BOT="GeneratedScript" endspan --> 
  <?php } ?>
</p>

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
<!-- InstanceEnd --></html><?php } ?>
