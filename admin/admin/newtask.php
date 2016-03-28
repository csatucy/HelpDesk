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
@import url("../../styles.css");
@import url("../../andry_styles.css");
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
<script type="text/javascript" src="../../cssmenu.js"></script>
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" media="all" href="cssmenu_ie.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="../../cssmenu.css" />
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
      <li><span><a href="../../index.php"><?php echo _("Home"); ?></a></span></li>
      <li><span><a href="../../announcements/announcements.php" ><?php echo _("Announcements"); ?> </a></span></li>
      <li><span><a href="http://its.cs.ucy.ac.cy/guides" target="Help" ><?php echo _("User Guides"); ?> </a></span>
        <ul class="level-1">
         <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/newuserguide.pdf" target="Help"><?php echo _("New user guide"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/linux_and_freenx.pdf" target="Help"><?php echo _("Unix Labs & FreeNX"); ?> </a></span></li> 
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/vpn.pdf" target="Help"><?php echo _("VPN"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/email.pdf" target="Help"><?php echo _("Email"); ?> </a></span></li>
          <li><span><a href="http://its.cs.ucy.ac.cy/images/stories/uploads/guides/www.pdf" target="Help"><?php echo _("Web services"); ?> </a></span></li>
        </ul>
      <li><span><a href="../../aliases.php" ><?php echo _("Email Aliases"); ?> </a></span></li>
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
        <div align="center"><img src="../../pictures/cs_ucy-logo.png" width="159" height="32"  /> <br />
            <br />
        </div>
        <div class="sidebarbox">
          <div class="sidebarboxtop menu"> <?php echo _("Menu:"); ?><br />
          </div>
          <div class="sidebarboxbottom"></div>
        </div>
        <ul>
          <li><a href="../../problem_out.php"><?php echo _("Enter Request"); ?> </a>          </li>
          <li><a href="../../solved_pending.php"><?php echo _("Requests & Answers"); ?> </a></li>
          <li><a href="../../onlysolved.php"><?php echo _("Solved Problems"); ?> </a></li>
          <li><a href="../../Key.php"><?php echo _("Search"); ?><script language="JavaScript" type="text/javascript"><!--



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
<form action="../../Search.php" method="post" name="FrontPage_Fom3" class="sidebardk_noborder" id="FrontPage_Fom3" onsubmit="return form1_Validator(this)" >
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
          <li><a href="../techtesting.php"><?php echo _("Technichian Control"); ?></a></li>
                  <?php } ?>
          <?php if ($_SESSION['valid_admin'])
            {?>
          <li> <a href="../admin.php"><?php echo _("Administrator Control"); ?> </a></li>
            <li> <a href="../analytics.php"><?php echo _("Analytics"); ?> </a></li>
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

         <a href="?which=<?php echo $which; ?>&locale=en_US"><img src="../../pictures/en.gif" /></a>
           <a href="?which=<?php echo $which; ?>&locale=el_GR"><img src="../../pictures/el.gif" /></a>         </td>
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
<small><a href="../../logout.php" class="sidebarlt"><?php echo _("Log Out"); ?></a></small><?php }  else { ?> <small><a href="../../login.php" class="sidebarlt"><?php echo _("Login"); ?></a></small>

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
    <td ><a href="../admin.php"  >Assign a problem</a></td>
    <td ><a href="edittech.php"  >Edit Technicians </a></td>
    <td ><a href="postdel.php"  >Remove a request</a></td>
    <td ><a href="reassign_problem.php">Re-assign a problem </a></td>
    <td ><a href="../tasks_pending.php"  >View all tasks</a></td>
    <td ><a href="newtask.php"  >Enter new task</a></td>
    <td ><a href="../techtesting.php"><?php echo _("View All assigned to Me"); ?></a></td>
     <td ><a href="../analytics.php"><?php echo _("Analytics"); ?></a></td>
    </tr>
</table>

	  
	  
	  <!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --></h1>
      
    <!-- InstanceBeginEditable name="EditRegion1" --><!--webbot BOT="GeneratedScript" PREVIEW=" " startspan -->
          <?php include ($_SESSION['directory_name'].'/tinymce/tinyconfig.inc');
  if (!(isset($_SESSION['valid_user'])))
     
  {
  $main="<META HTTP-EQUIV='refresh' content='0;URL=";
    $wtarget=$main."login.php"."'>";
    echo $wtarget;
 } 
  
 
  else {
 
 $query_Allid="select * from technicians ";
$query_Allid=$query_Allid." ORDER BY technicians.techid"; //Epilegei olous tous technikous pou doulevoun akoma Working=1
$Allid = mysql_query($query_Allid, $helpdeskphp) or die(mysql_error()); //Me vasi to id tous
$row_Allid = mysql_fetch_assoc($Allid);
$totalRows_Allid = mysql_num_rows($Allid); 

 
 
 

		 ?>
<script language="JavaScript" type="text/javascript"><!--
function FrontPage_Form3_Validator(theForm)
{

var content = tinyMCE.activeEditor.getContent(); 
theForm.descr.value=content;


  if (theForm.name.value == "")
  {
    alert("Please enter a value for the \"Name\" field.");
    theForm.name.focus();
    return (false);
  }

  if (theForm.subject.value == "")
  {
    alert("Please enter a value for the \"Subject\" field.");
    theForm.subject.focus();
    return (false);
  }

if (theForm.Tech.value == "0")
  {
    alert("Please enter a value for the \"Assigned to \" field.");
    theForm.Tech.focus();
    return (false);
  }
  
  
  if (theForm.descr.value == "")
  {
    alert("Please enter a value for the \"Description\" field.");
    theForm.descr.focus();
    return (false);
  }
  
    return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan -->

<form action="tasks.php" method="post" name="FrontPage_Form3" id="FrontPage_Form3" onsubmit="return FrontPage_Form3_Validator(this)">
<br />
  <table width="599" height="1" border="0" align="center" bordercolor="#000000">
  <tr class="tasks_sidebar">
    <td width="593" align="center" height="21">
        <b><?php echo _("Enter New Task"); ?></b></td>
  </tr>
  <tr class="sidebarlt" >
    <td width="593" align="center" height="1" valign="top" class="text">
      <?php echo _("You can insert a new task at any time by filling out the following form. You can view the state of all tasks at the"); ?><a href="tasks_pending.php"> <?php echo _("Tasks"); ?>&amp; <?php echo _("Answer section.&nbsp;");?></a><?php echo _("If your task is very urgent , you can post it as an urgent task and prioritize it."); ?> </td>
  </tr>

  <tr>
    <td><br />
      <table border="0" height="1" width="579" align="center">
		  <tr>
			<td align="left" height="21" nowrap="nowrap">
		    <font face="Arial" size="2" nowrap="nowrap"><b><?php echo _("Name:");?></font></td>
			<td width="575" align="right" height="21">
			   <div align="left">
			     <input type="text" name="name" size="50" tabindex="1" maxlength="50" value="" />
			     <font face="Arial" color="red" size="4"><b>*<b></font> </div></td>
		  </tr>

		  <tr>
			  <td align="left" height="21" nowrap="nowrap">
				 <font face="Arial" size="2"><b><?php echo _("Email&nbsp;:");?><b></font>			  </td>
			  <td align="right" height="21" nowrap="nowrap">
				 <div align="left">
				   <?php $putmail=$_SESSION['valid_user']."@cs.ucy.ac.cy"; ?>
				   
				   <input name="email" input="input" type="text" class="fieldbg" value="<?php echo $putmail; ?>" size="50" readonly="true" />
				   
			      <font face="Arial" color="red" size="4"><b>*<b></font> </div></td>
		  </tr>
		  <tr>
			  <td align="left" height="21" nowrap="nowrap">
				 <font face="Arial" size="2"><b><?php echo _("Urgent Task:");?> <b></font>			  </td>
			  
            <td align="right" height="21" nowrap="nowrap"> <div align="left"><font color="red" face="arial" size="2"><b><?php echo _("Yes");?></b></font> 
              <input name="C1" type="checkbox" value='0'
				onclick="if (this.checked){alert('HELPDESK NOTICE: This option should be checked for tasks that really need immediate action {servers down, printers stuck, mailq stuck}, and where immediate action can be taken.');this.value=1; } else if (!this.checked)this.value=0;		" />
              
            </div></td>
		  </tr>
		  <tr>
			  <td align="left" height="21" nowrap="nowrap">
				 <font face="Arial" size="2"><b><?php echo _("Subject of the task:");?><b></font>			  </td>
                 
                                
                 
			  <td align="right" height="21" nowrap="nowrap">
				 <div align="left">
				   <input type="text" name="subject" size="50" tabindex="3" value="" />
			      <font face="Arial" color="red" size="4"><b>*<b></font> </div></td>
		  </tr>
          
           <tr>
			  <td align="left" height="21" nowrap="nowrap">
				 <font face="Arial" size="2"><b><?php echo _("Assign to:");?><b></font>			  </td>
                 
                                
                 
			  <td align="right" height="21" nowrap="nowrap">
                
                    <div align="left">
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
                      <font face="Arial" color="red" size="4"><b>*<b></font></div></td>
		  </tr>
          
          
          
          
          
          
		  <tr>
				<td width="575" align="center" height="21" colspan="2">
					   <br />
					   <font face="Arial" size="2"><b><?php echo _("Detailed description of the taks assign:");?><b></font></br></br>
					   <textarea cols="50" rows="12" name="descr" tabindex="4"></textarea>				</td>
		  </tr>
		  <tr>
  				  <td width="575" align="center" height="21" colspan="2">
		  				    <input type="submit" value="<?php echo _("Submit Task");?>" tabindex="5" />&nbsp;&nbsp;
							<input type="reset" value="<?php echo _("Reset Form");?>" tabindex="5" />
              <br />
              <br />
              <font color="#FF0000" size="1" face="Arial" class="note"> <strong><?php echo _("Note"); ?></strong> 
  :<?php echo _("You will be notified at the email address you gave above, every time someone follows up or solves your task.");?> </font>            </td>
		  </tr>
		</table>	</td>
</tr>
 <tr class="back">
    <td width="593" align="center" height="21">&nbsp;  </td></tr>
</table>

</form>

<!-- InstanceEndEditable --></div>
    <br class="clearFloat" />
  </div>
  <div id="footer">
    <p><a href="../../index.php"><?php echo _("Home"); ?></a> | <a href="../../announcements/announcements.php" ><?php echo _("Announcements"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/guides" target="Help" ><?php echo _("User Guides"); ?> </a> |<a href="../../aliases.php" ><?php echo _("Email Aliases"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/" target="Help"><?php echo _("ITS WebSite"); ?> </a>| <a href="http://its.cs.ucy.ac.cy/faqs" target="Help"><?php echo _("FAQs"); ?> </a> | <a href="http://its.cs.ucy.ac.cy/contact/about" target="Help"><?php echo _("Contact Us"); ?> </a> | <a href="../../about.php" ><?php echo _("About"); ?> </a></p>
    <p>This site is copyright © 2013 The HelpDesk support Team<img src="http://www.justdreamweaver.com/templates/link/spacer.gif" width="1" /></p>
  </div>
  <!--The following code must be left in place and unaltered for free usage of this theme. If you wish to remove the links, contact us at http://www.justdreamweaver.com and get template pricing for a link-free template.-->
  <div id="credit">This <a href="http://www.justdreamweaver.com/dreamweaver-templates.html">free Dreamweaver template</a> created by <a href="http://www.justdreamweaver.com">JustDreamweaver.com</a></div>
</div>
</body>
<!-- InstanceEnd --></html><?php }}?>

