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
      
    <!-- InstanceBeginEditable name="EditRegion1" -->

<style type="text/css">
<!--
.style1 {color: #CC6600}
.style15 {font-size: medium}
.style15 {	color: #9999FF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: small;
}
.style16 {font-size: large}
.style16 {font-weight: bolder}
.style18 {color: #AA0000; font-weight: bold; text-decoration: underline; font-family: "Book Antiqua";}
.style18 {	color: #000000;
	font-size: large;
}
-->
</style>
<style type="text/css">
<!--
.style20 {
	color: #CCFF99;
	font-style: italic;
}
-->
</style>
<style type="text/css">
<!--
.style21 {color: #0000CC}
-->
</style>


<br />
       <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan -->
<script language="JavaScript" type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{
  if (theForm.techname.value == "")
  {
    alert("Please enter a value for the \"Name\" field.");
    theForm.techname.focus();
    return (false);
  }
 if (theForm.techlogin.value == "")
  {
    alert("Please enter a value for the \"Login\" field.");
    theForm.techlogin.focus();
    return (false);
  }
    if( !isValidType( theForm.techemail, 'email' ) ) 
  {
		window.alert( 'You have not given a valid email address.' );
		theForm.techemail.focus();
		return false;
	}
    return (true);
}
function isValidType( oInput, oType ) 
{
	switch( oType.toLowerCase() ) 
	{
		case 'email':
			return ( oInput.value && !oInput.value.replace( /[\w\-\+]+(\.[\w\-\+]+)*@([\w\-]+\.)+[a-z]+/i, "" ) );
	}
}

//--></script>
<!--webbot BOT="$GeneratedScript"$endspan-->
 <script language="JavaScript" type="text/javascript"><!--
function FrontPage_Form2_Validator(FrontPage_Form2)
{
   if (FrontPage_Form2.menu1.value=="0")
  {
    alert("Please select a technician first.");
    FrontPage_Form2.menu1.focus();
    return (false);
  }
return(true);
}

function form2_Valid(form2)
{
   if (form2.menu2.value=="0")
  {
    alert("Please select a technician first.");
    form2.menu2.focus();
    return (false);
  }
return(true);
}
//--></script><!--webbot BOT="$GeneratedScript"$endspan-->
<form action="../others/tech/add.php" method="post" 
		name="FrontPage_Form1" id="FrontPage_Form1"  onsubmit="return FrontPage_Form1_Validator(this)">
          <blockquote>
            <p align="left" class="style18"><u>            Add new technician: </u> </p>
            <p align="left"> <span class="text">Full Name:
                <input name="techname" type="text" id="techname" size="50" />
                <br />
                <br />
            Login:<input name="techlogin" type="text" class="highlight" id="techlogin" />
                <br />
                <br />

            Phone: 
            <input name="techPhone" type="text" id="techPhone" size="24" />
              <br />
              <br />
            Email:</span><input name="techemail" type="text" id="techemail" />
              <span class="error">*Must be <span class="style20 style21">login</span>@cs.ucy.ac.cy </span><br />
              <br />
                <input type="reset" name="Reset" value="Reset Form" />
                <input type="submit" name="Submit" value="Add New" />&nbsp;
            </p>
          </blockquote>
          <blockquote><blockquote>
          <hr />
          </blockquote>
          </blockquote>
      </form>
       
          <form action="../others/tech/techedit.php" method="post" 		name="FrontPage_Form2" id="FrontPage_Form2" onsubmit="return FrontPage_Form2_Validator(this)">
              <div align="left">
                <blockquote>
                  <blockquote><span class="style18"><strong><u>Edit a Tecnician</u></strong> </span> <br />
                        <br />
                  <span class="text">Technician Name:</span>                    </blockquote>
                    <blockquote><div align="left">
                      <p></p>
                          <input type="hidden" name="techid" value="<?php echo $menu1; ?>" />
                      </div>
                    </blockquote>
                        <select name="menu1" class="fieldbg" id="SelectTech">
                      <option value="0">-- Choose a technician  --</option>
                      <?php
do {  ?>
                      <option value="<?php echo $row_Allid['techid']?>" selected="selected"><?php echo $row_Allid['techname'];?></option>
                      <?php
} while ($row_Allid = mysql_fetch_assoc($Allid));
  $rows = mysql_num_rows($Allid);
  if($rows > 0) {
      mysql_data_seek($Allid, 0);
	  $row_Allid = mysql_fetch_assoc($Allid); 
   }
   $user= $row_Allid['techid'];
	$_SESSION['user']=$user;
?> 
            </select>
                        <input type="submit" name="Submit" value="Edit Technician" />
                </blockquote>
            </div>
      </form>   
        <blockquote>
		
		<form  action="../others/tech/techremove.php" method="post"	name="form2" id="form2"onsubmit="return form2_Valid(this)" >
          <p align="left"><span class="style18">Remove Technician
              <input name="techid" type="hidden" id="techid" value="<?php echo $menu2; ?>" />
</span></p>
          <p align="left"> <span class="textintence">
              <select name="menu2" class="fieldbg" id="SelectTech">
                <option value="0" selected="selected">-- Choose a technician --</option>
                <?php do {   ?>
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
              <input type="submit" name="Submit" value="Remove Technician" />
            </span> </p>
          </form>
          <p class="textintence">&nbsp;</p>
      </blockquote>
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
<!-- InstanceEnd --></html><?php } ?>
