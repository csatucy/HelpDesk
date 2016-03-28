<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/webtwoleftcss.dwt" codeOutsideHTMLIsLocked="false" -->
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
@import url("styles.css");
@import url("andry_styles.css");
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
<script type="text/javascript" src="cssmenu.js"></script>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" media="all" href="cssmenu_ie.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="cssmenu.css" />
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
      <li><span><a href="index.php"><?php echo _("Home"); ?></a></span></li>
      <li><span><a href="announcements/announcements.php" ><?php echo _("Announcements"); ?> </a></span></li>
      <li><span><a href="http://its.cs.ucy.ac.cy/guides" target="Help" ><?php echo _("User Guides"); ?> </a></span>
        <ul class="level-1">
         <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/newuserguide.pdf" target="Help"><?php echo _("New user guide"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/linux_and_freenx.pdf" target="Help"><?php echo _("Unix Labs & FreeNX"); ?> </a></span></li> 
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/vpn.pdf" target="Help"><?php echo _("VPN"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/email.pdf" target="Help"><?php echo _("Email"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/www.pdf" target="Help"><?php echo _("Web services"); ?> </a></span></li>
        </ul>
      <li><span><a href="aliases.php" ><?php echo _("Email Aliases"); ?> </a></span></li>
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
        <div align="center"><img src="pictures/cs_ucy-logo.png" width="159" height="32"  /> <br />
            <br />
        </div>
        <div class="sidebarbox">
          <div class="sidebarboxtop menu"> <?php echo _("Menu:"); ?><br />
          </div>
          <div class="sidebarboxbottom"></div>
        </div>
        <ul>
          <li><a href="problem_out.php"><?php echo _("Enter Request"); ?> </a>          </li>
          <li><a href="solved_pending.php"><?php echo _("Requests & Answers"); ?> </a></li>
          <li><a href="onlysolved.php"><?php echo _("Solved Problems"); ?> </a></li>
          <li><a href="Key.php"><?php echo _("Search"); ?><script language="JavaScript" type="text/javascript"><!--



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
<form action="Search.php" method="post" name="FrontPage_Fom3" class="sidebardk_noborder" id="FrontPage_Fom3" onsubmit="return form1_Validator(this)" >
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
          <li><a href="admin/techtesting.php"><?php echo _("Technichian Control"); ?></a></li>
                  <?php } ?>
          <?php if ($_SESSION['valid_admin'])
            {?>
          <li> <a href="admin/admin.php"><?php echo _("Administrator Control"); ?> </a></li>
            <li> <a href="admin/analytics.php"><?php echo _("Analytics"); ?> </a></li>
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

         <a href="?which=<?php echo $which; ?>&locale=en_US"><img src="pictures/en.gif" /></a>
           <a href="?which=<?php echo $which; ?>&locale=el_GR"><img src="pictures/el.gif" /></a>         </td>
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
<small><a href="logout.php" class="sidebarlt"><?php echo _("Log Out"); ?></a></small><?php }  else { ?> <small><a href="login.php" class="sidebarlt"><?php echo _("Login"); ?></a></small>

<?php }

?>        </td>
      </tr>
    </table>
    
    
    
    
    
    <div id="content-right"><!-- InstanceBeginEditable name="EditRegion5" -->
    <?php
$what=Sanitized($_POST["what"]);//Prevent from SQL Injection attacks   
$what=SanitizedXSS($_POST["what"]);//Prevent from XSS attacks 

$menu_sort=$_POST['menu_sort'];
$menu_sort2=$_POST['menu_sort2'];

if (empty($_POST["what"])) { header("Location: ./Key.php"); } else   
{
$IDfield="problemid";
$scriptresponder="subjectview4.php";

//Search sto pinaka Problems 
$mySQLx="select * from problems where problemid Like'%$what%' OR descr  Like'%$what%' OR subject Like'%$what%' OR name Like'%$what%' ";
 
 if (($menu_sort==0)&&($menu_sort2==0) )
     {$mySQLx=$mySQLx." ORDER BY problems.problemid  DESC";}
   
if (($menu_sort==0)&&($menu_sort2==1) )                         //by id
     {$mySQLx=$mySQLx." ORDER BY problems.problemid  ASC";}
    
     if (($menu_sort==1) &&($menu_sort2==1) )                    //by urgency state
     {$mySQLx=$mySQLx." ORDER BY problems.urgency  ASC";}
      if (($menu_sort==1) &&($menu_sort2==0) )
     {$mySQLx=$mySQLx." ORDER BY problems.urgency  DESC";}
  
    if (($menu_sort==2) &&($menu_sort2==1) )                     //by topic/subject
     {$mySQLx=$mySQLx." ORDER BY problems.subject  ASC";}
      if (($menu_sort==2) &&($menu_sort2==0) )
     {$mySQLx=$mySQLx." ORDER BY problems.subject  DESC";}
  
    if (($menu_sort==3) &&($menu_sort2==1) )                  //by originator
     {$mySQLx=$mySQLx." ORDER BY problems.name  ASC";}
      if (($menu_sort==3) &&($menu_sort2==0) )
     {$mySQLx=$mySQLx." ORDER BY problems.name DESC";}
  
   if (($menu_sort==4) &&($menu_sort2==1) )                  //by date
     {$mySQLx=$mySQLx." ORDER BY problems.indate  ASC";}
      if (($menu_sort==4) &&($menu_sort2==0) )
     {$mySQLx=$mySQLx." ORDER BY problems.indate DESC";}
	 
	 ?><?php   $rstempx_query=mysql_query($mySQLx);  
error();
$rstempx=mysql_fetch_array($rstempx_query);

//Search sto pinaka Answers
$mySQLy="select * from answers, problems where problems.problemid=answers.problemid and (answers.techdescr Like'%$what%' OR name_ans Like'%$what%' OR indate_ans Like'%$what%')";

 if (($menu_sort==0)&&($menu_sort2==0) )
     {$mySQLy=$mySQLy." ORDER BY answers.problemid  DESC";}
   
if (($menu_sort==0)&&($menu_sort2==1) )                         //by id
     {$mySQLy=$mySQLy." ORDER BY answers.problemid  ASC";}
    
     if (($menu_sort==1) &&($menu_sort2==1) )                    //by urgency state
     {$mySQLy=$mySQLy." ORDER BY problems.urgency  ASC";}
      if (($menu_sort==1) &&($menu_sort2==0) )
     {$mySQLy=$mySQLy." ORDER BY problems.urgency  DESC";}
  
    if (($menu_sort==2) &&($menu_sort2==1) )                     //by topic/subject
     {$mySQLy=$mySQLy." ORDER BY problems.subject  ASC";}
      if (($menu_sort==2) &&($menu_sort2==0) )
     {$mySQLy=$mySQLy." ORDER BY problems.subject  DESC";}
  
    if (($menu_sort==3) &&($menu_sort2==1) )                  //by originator
     {$mySQLy=$mySQLy." ORDER BY problems.name  ASC";}
      if (($menu_sort==3) &&($menu_sort2==0) )
     {$mySQLy=$mySQLy." ORDER BY problems.name DESC";}
  
   if (($menu_sort==4) &&($menu_sort2==1) )                  //by date
     {$mySQLy=$mySQLy." ORDER BY problems.indate  ASC";}
      if (($menu_sort==4) &&($menu_sort2==0) )
     {$mySQLy=$mySQLy." ORDER BY problems.indate DESC";}


$rstempy_query=mysql_query($mySQLy);  
error();
$rstempy=mysql_fetch_array($rstempy_query);

//Search sto pinaka Announce
$mySQLz="select * from announce where author Like'%$what%' OR body Like'%$what%' OR subject Like'%$what%' ";
 if (($menu_sort==0)&&($menu_sort2==0) )
     {$mySQLz=$mySQLz." ORDER BY id  DESC";}
   
if (($menu_sort==0)&&($menu_sort2==1) )                         //by id
     {$mySQLz=$mySQLz." ORDER BY id  ASC";}
    
   
    if (($menu_sort==2) &&($menu_sort2==1) )                     //by topic/subject
     {$mySQLz=$mySQLz." ORDER BY subject  ASC";}
      if (($menu_sort==2) &&($menu_sort2==0) )
     {$mySQLz=$mySQLz." ORDER BY subject  DESC";}
  
    if (($menu_sort==3) &&($menu_sort2==1) )                  //by originator
     {$mySQLz=$mySQLz." ORDER BY author  ASC";}
      if (($menu_sort==3) &&($menu_sort2==0) )
     {$mySQLz=$mySQLz." ORDER BY author DESC";}
  
   if (($menu_sort==4) &&($menu_sort2==1) )                  //by date
     {$mySQLz=$mySQLz." ORDER BY indate  ASC";}
      if (($menu_sort==4) &&($menu_sort2==0) )
     {$mySQLz=$mySQLz." ORDER BY indate DESC";}

$rstempz_query=mysql_query($mySQLz);  
error();
$rstempz=mysql_fetch_array($rstempz_query);


?>   
<div align="center"><span class="titlosGrante"><strong><br />
  </strong></span><span class="titlos"><strong><?php echo _("Search Results for the key term");?>:</strong></span>  <span class="titlos">
  <?php 
echo $what; ?> 
    </span><small>    </small> <br />
    <br />  
	
	<?php if (!(($rstempx==0)&&($rstempy==0)&&($rstempz==0)))
	{?>
    <form method="post" name="form1" id="form1"  >
	  <span class="style16 text"><strong><span class="text"><small>
	  </small><?php echo _("Sort by");?>:</span></strong></span>
      <select name="menu_sort" class="text" id="menu_sort" >
        <option value="0" <?php if (empty($_POST["menu_sort"])) {echo(" selected");} ?>><?php echo _("No");?></option>
        <option value="1"<?php if ($_POST["menu_sort"]=="1"){ echo (" selected");}?>><?php echo _("State");?></option>
        <option value="2"<?php if ($_POST["menu_sort"]=="2"){ echo (" selected");}?>><?php echo _("Topic");?></option>
        <option value="3"<?php if ($_POST["menu_sort"]=="3"){ echo (" selected");}?>><?php echo _("Originator");?></option>
        <option value="4"<?php if ($_POST["menu_sort"]=="4"){ echo (" selected");}?>><?php echo _("Date");?></option>
      </select>
          <select name="menu_sort2" class="text" id="menu_sort2">
        <option value="1"<?php if ($_POST["menu_sort2"]=="1"){ echo (" selected");}?>><?php echo _("Ascending");?></option>
        <option value="0" <?php if (empty($_POST["menu_sort2"])) {echo(" selected");} ?>><?php echo _("Decending");?></option>
      </select>
      <input name="Submit" type="submit" value="<?php echo _("Go");?>" />
      <small>
      <input name="what" type="hidden" id="what" value="<?php       echo $what; ?>" />
      </small>    </form>
    <br />      
</div><?php } ?>




<div align="center"><span class="style14"><?php echo _("Results in reported Answers");?></span><br /><br />
  
	
	<?php  if ($rstempx==0) echo ("<strong><font face=Verdana, Arial, Helvetica, sans-serif><u>No problems reported including term:</u></font></strong>  ".$what."<br><br>"); else { ?>
	
</div>
        <table width="100%"  align="center" >
         <tr class="textintence" >
                <td width="5%" height="100%" class="sidebardk" ><?php echo _("No");?></td>
               <td width="7%" height="100%" align="center" class="sidebardk"><?php echo _("State");?></td>
               <td width="32%"  height="100%" class="sidebardk"><?php echo _("Topic");?> </td>
               <td width="19%"  height="100%" class="sidebardk" ><?php echo _("Originator");?></td>
               <td width="11%"  height="100%" align="center" class="sidebardk"><?php echo _("Date");?></td>
               <td width="26%"  height="100%" class="sidebardk"><?php echo _("Replies From");?></td>
          </tr>   
          <?php // Now lets grab all the records from problems 
		
$count=0;
while(!$rstempx==0)
{

$count=$count+1;
  $problemid=$rstempx["problemid"];
  $form_subject=$rstempx["subject"];
  $form_indate=$rstempx["indate"];
  $form_name=$rstempx["name"];
  $urgency=$rstempx["urgency"];


  $mySQLreplies="select * from answers where problemid=$problemid ORDER BY answerid DESC"; 
  $mySQLstate="select * from problems where problemid=$problemid ORDER BY problemid DESC";

$rsReplies_query=mysql_query($mySQLreplies);  
error();
$rsReplies=mysql_fetch_array($rsReplies_query);
$rsstate_query=mysql_query($mySQLstate);  
$rsstate=mysql_fetch_array($rsstate_query);

?>
          <tr class="sidebarlt">
            <td width="9%"  valign="top" align="center"> <?php   echo $problemid; ?></td>
            <td width="5%" align="center" valign="top">
                <?php 
    $flag2=0;
while(!($rsstate==0))
    {
      if ($flag2==0)
      {
        $statement=$rsstate["solvedstate"];
        $flag2=1;
      } 

      $rsstate=mysql_fetch_array($rsstate_query);

    } 

      if ($urgency=="1")
    {

      echo "<img src='pictures/hot.gif' alt='Urgent Problem! - Administrator notified via email' >";
	
	   } 
	  
	   if ($statement=="0") 
	  {

      
	  echo  "<img  src='pictures/closed.gif' alt='Pending or Unsolved by Technician.' >";	   } 
	
	     else
	  {

   
	  echo "<img  src='pictures/yellockfolder.gif' alt='Checked as Solved Problem by technician.' >";	   } 


?>
          </td>
            <td "width="27%" height="23" valign="top"><?php     $my_link=$scriptresponder."?which=".$rstempx[$IDfield]; ?>
               <a href="<?php     echo $my_link; ?>">
                  <?php     echo $form_subject; ?>
            </a></td>
            <td width="15%" height="23" valign="top">
              <?php     echo $form_name; ?>
         </td>
            <td width="18%" height="23" align="center" valign="top">
              <?php     echo $form_indate; ?>
           </td>
            <td width="26%" height="23" valign="top" > 
              <?php     $flag=0;
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
           </td>
          </tr>
          <?php 
$rstempx=mysql_fetch_array($rstempx_query);
}
$rstempx_query=mysql_query($mySQLx);
$rstempx=@mysql_fetch_array($rstempx_query);

$rstemp=null;
  ?>
      </table>
        
        <?php }?>
       <br />
      
       <br />




        <div align="center"> 
       <span class="style14"><?php echo _("Results in reported Answers");?></span><br />
        <br />
			                        
	    <?php if ($rstempy==0) echo ("<strong><font face=Verdana, Arial, Helvetica, sans-serif><u>No answers reported including term:</u></font></strong>  ".$what."<br><br>"); else { ?>
			                        
                                                                            
      </div>
      <div align="center">
            <table width="100%"  align="center" >
         <tr class="textintence" >
                <td width="5%" height="100%" class="sidebardk" ><?php echo _("No");?></td>
               <td width="7%" height="100%" align="center" class="sidebardk"><?php echo _("State");?></td>
               <td width="32%"  height="100%" class="sidebardk"><?php echo _("Topic");?> </td>
               <td width="19%"  height="100%" class="sidebardk" ><?php echo _("Originator");?></td>
               <td width="11%"  height="100%" align="center" class="sidebardk"><?php echo _("Date");?></td>
               <td width="26%"  height="100%" class="sidebardk"><?php echo _("Replies From");?></td>
          </tr>   
            <?php // Now lets grab all the records from answers
$count=0;
while(!$rstempy==0)
{

$count=$count+1;
  $problemid=$rstempy["problemid"];
    
$mySQL="select * from problems where problems.problemid= $problemid ";
$rstemp_query=mysql_query($mySQL);  
error();
$rstemp=mysql_fetch_array($rstemp_query);


  $form_subject2=$rstemp["subject"];
  $form_indate2=$rstemp["indate"];
  $form_name2=$rstemp["name"];
  $urgency=$rstemp["urgency"];


  $mySQLreplies="select * from answers where problemid=$problemid ORDER BY answerid DESC"; 
  $mySQLstatey="select * from answers where problemid=$problemid ORDER BY answerid DESC";

$rsReplies_query=mysql_query($mySQLreplies);  
error();
$rsReplies=mysql_fetch_array($rsReplies_query);
$rsstatey_query=mysql_query($mySQLstatey);  
$rsstatey=@mysql_fetch_array($rsstatey_query);
?>
          <tr class="back">
              <td width="9%"  align="center"  >
               <?php     echo $problemid; ?>           </td>
              <td width="5%" align="center" valign="top">
               <?php 
    $flag2=0;
    $statementy=0;
while(!($rsstatey==0))
    {
      if ($flag2==0)
      {
        $statementy=$rsstatey["state"];
        $tech=$rsstatey["techname"];
        $flag2=1;
      } 

      $rsstatey=mysql_fetch_array($rsstatey_query);

    } 

       if ($urgency=="1")
    {

      echo "<img src='pictures/hot.gif' alt='Urgent Problem! - Administrator notified via email' >";
	
	   } 
	  
	   if ($stetement=="0") 
	  {

      
	  echo "<img  src='pictures/closed.gif' alt='Pending or Unsolved by Technician.' >";	   } 
	
	     else
	  {

   
	  echo "<img  src='pictures/yellockfolder.gif' alt='Checked as Solved Problem by technician.' >";	   } 

?>
            </td>
              <td "width="27%" valign="top"><?php     $my_link=$scriptresponder."?which=".$rstempy[$IDfield]; ?>
                 <a href="<?php     echo $my_link; ?>">
                    <?php     echo $form_subject2; ?>
            </a></td>
              <td width="15%" valign="top">
                <?php     echo $form_name2; ?>
          </td>
              <td width="18%" align="center" valign="top">
                <?php     echo $form_indate2; ?>
              </td>
              <td width="26%" valign="top">
                <?php     $flag=0;
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
              </td>
            </tr>
            <?php 
$rstempy=mysql_fetch_array($rstempy_query);

} 

$rstempy_query=mysql_query(($mySQLy));
$rstempy=mysql_fetch_array($rstempy_query);



?>
          </table> 
       
          <?php } ?>
		  
         
           
            
        <br />
<br />
<span class="style14"><?php echo _("Results in reported Announcements");?></span><br />
        <br />
			
			<?php if ($rstempz==0) echo ("<strong><font face=Verdana, Arial, Helvetica, sans-serif><u>No announcements reported including term:</u></font></strong>  ".$what."<br><br>"); else { ?>
			
          
         
          <table width="100%"  align="center">
                  
            <tr bgcolor="#666600" align="left">
    <th width="5%" class="sidebardk" scope="col"><?php echo _("No"); ?> </th>
    <th width="12%" class="sidebardk" scope="col"><?php echo _("Date"); ?></th>
    <th width="18%" class="sidebardk" scope="col"><?php echo _("Author"); ?></th>
    <th width="42%" class="sidebardk" scope="col"><?php echo _("Subject"); ?> </th>
    <th width="15%" class="sidebardk" scope="col"><?php echo _("Renewal Date"); ?> </th>
    <?php if ($_SESSION['valid_tech']) {?>
    <th width="8%" class="sidebardk" scope="col"><?php echo _("Edit"); ?> </th>
    <?php }?>
  </tr>
            <?php
  	$tmp = 1;
while(!$rstempz==0){

	$aid = $rstempz["id"];
	$adate = $rstempz["indate"];
	$aauthor = $rstempz["author"];
	$asubject = $rstempz["subject"];
	$abody = $rstempz["body"];
	$update =$rstempz["up-date"];
	$tmp = $tmp+1;
	
?>
            <tr class="tasks_menu" >
              <td height="40"><?php echo $rstempz["id"]; ?></td>
              <td><a href="announcements/showann.php?myid=<?php echo $aid; ?>" > <?php echo $asubject; ?> </a> &nbsp;</td>
              <td><?php echo $aauthor; ?>&nbsp;</td> 
               <td><?php echo $adate; ?>&nbsp;</td>
              <td><?php echo $update; ?>&nbsp;
              &nbsp;</td>
              <?php if ($_SESSION['valid_tech']) {?>
              <td><div align="center"><a href="edit-announcement.php?typeid=1&amp;myid=<?php echo $aid; ?>"><?php echo _("Edit");?></a></div>
                   </span>
              </td>
              <?php }?>
            </tr>
            <?php $rstempz=mysql_fetch_array($rstempz_query);

} // close while

$rstempz_query=mysql_query(($mySQLz));
$rstempz=mysql_fetch_array($rstempz_query);


	
?>
          </table>
        <?php } ?>
      </div>
      

<style type="text/css">
<!--
.style16 {font-weight: bold}
-->
</style>
      <!-- InstanceEndEditable --></div>
    <br class="clearFloat" />
  </div>
  <div id="footer">
    <p><a href="index.php"><?php echo _("Home"); ?></a> | <a href="announcements/announcements.php" ><?php echo _("Announcements"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/guides" target="Help" ><?php echo _("User Guides"); ?> </a> |<a href="aliases.php" ><?php echo _("Email Aliases"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/" target="Help"><?php echo _("ITS WebSite"); ?> </a>| <a href="http://its.cs.ucy.ac.cy/faqs" target="Help"><?php echo _("FAQs"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/contact/about" target="Help"><?php echo _("Contact Us"); ?> </a> | <a href="about.php" ><?php echo _("About"); ?> </a></p>
    <p>This site is copyright © 2013 The HelpDesk support Team<img src="http://www.justdreamweaver.com/templates/link/spacer.gif" width="1" /></p>
  </div>
  <!--The following code must be left in place and unaltered for free usage of this theme. If you wish to remove the links, contact us at http://www.justdreamweaver.com and get template pricing for a link-free template.-->
  <div id="credit">This <a href="http://www.justdreamweaver.com/dreamweaver-templates.html">free Dreamweaver template</a> created by <a href="http://www.justdreamweaver.com">JustDreamweaver.com</a></div>
</div>
</body>
<!-- InstanceEnd --></html>
<?php } ?>
