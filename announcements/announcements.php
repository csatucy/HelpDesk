<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/webtwoleftcss.dwt" codeOutsideHTMLIsLocked="false" -->
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
      <li><span><a href="announcements.php" ><?php echo _("Announcements"); ?> </a></span></li>
      <li><span><a href="http://its. /guides" target="Help" ><?php echo _("User Guides"); ?> </a></span>
        <ul class="level-1">
         <li><span><a href="http://its. /images/stories/uploads/guides/newuserguide.pdf" target="Help"><?php echo _("New user guide"); ?> </a></span></li>
          <li><span><a href="http://its. /images/stories/uploads/guides/linux_and_freenx.pdf" target="Help"><?php echo _("Unix Labs & FreeNX"); ?> </a></span></li> 
          <li><span><a href="http://its. /images/stories/uploads/guides/vpn.pdf" target="Help"><?php echo _("VPN"); ?> </a></span></li>
          <li><span><a href="http://its. /images/stories/uploads/guides/email.pdf" target="Help"><?php echo _("Email"); ?> </a></span></li>
          <li><span><a href="http://its. /images/stories/uploads/guides/www.pdf" target="Help"><?php echo _("Web services"); ?> </a></span></li>
        </ul>
      <li><span><a href="../aliases.php" ><?php echo _("Email Aliases"); ?> </a></span></li>
              <li><span><a href="http://its. /" target="Help"><?php echo _("ITS WebSite"); ?> </a></span></li>
            
         

      <li><span><a href="http://its. /faqs" target="Help"><?php echo _("FAQs"); ?> </a></span></li>
      <li><span><a href="http://its. /contact/about" target="Help"><?php echo _("Contact Us"); ?> </a></span></li>
      
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
          <li><a href="../admin/techtesting.php"><?php echo _("Technichian Control"); ?></a></li>
                  <?php } ?>
          <?php if ($_SESSION['valid_admin'])
            {?>
          <li> <a href="../admin/admin.php"><?php echo _("Administrator Control"); ?> </a></li>
            <li> <a href="../admin/analytics.php"><?php echo _("Analytics"); ?> </a></li>
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
    
    
    
    
    
    <div id="content-right"><!-- InstanceBeginEditable name="EditRegion5" -->
<?php (isset ($_GET['obsolete']))? $obsolete=$_GET['obsolete'] : $obsolete="";

if ($obsolete=="yes") {
$query = "SELECT * FROM announce ORDER BY id desc LIMIT 0 , 15";
}
if ($obsolete=="") {
$query = "SELECT * FROM announce where (state='active') ORDER BY id desc LIMIT 0 , 15"; 

}

if ($obsolete=="all") {
$query = "SELECT * FROM announce ORDER BY id DESC"; 
}


$result = mysql_query($query);
error();
$numrows = mysql_num_rows($result);
?>


<div >
  <div >
   
    <table width="687" border="0" align="center" class="sidebardk_noborder_v2">
      <tr>
        <td width="178" >
          <div align="center">
            <?php if ($_SESSION['valid_tech']) {?>
            <a href="make-announcement.php?typeid=1"><?php echo _("New Announcement"); ?></a>            </div>
        </td>
        <td width="259"><div align="center">
          <?php }
    
if ($obsolete=="") {		
?>
          <a href="announcements.php?obsolete=yes" > <?php echo _("Include obsolete announcements"); ?></a><br />
          <?php }
if ($obsolete=="yes") {
?>
          <a href="announcements.php" ><?php echo _("Remove obsolete announcements"); ?></a>
          <?php }
?>
        </div></td>
        <td width="236">
        
          <div align="center">
            <?php 
    
if ($obsolete=="") {		
?>
            <a href="announcements.php?obsolete=all"><?php echo _("View all announcements"); ?></a><br />
             <?php }
else {
?>
             <a href="announcements.php" ><?php echo _("View latest announcements"); ?></a>
             <?php }
?>
             </div></td>
      </tr>
    </table>
  </div>
  <div></div>
</div>
<br />
<table width="99%"  border="0" align="left">
  
  <div align="left"><span class="titlos "><strong><?php echo _("Announcements"); ?>:</strong></span></div>
  <br />
  <tr bgcolor="#666600" align="left">
    <th width="5%" class="sidebardk" scope="col"><?php echo _("No"); ?> </th>
    <th width="10%" class="sidebardk" scope="col"><?php echo _("Date"); ?></th>
    <th width="16%" class="sidebardk" scope="col"><?php echo _("Author"); ?></th>
    <th width="14%" class="sidebardk" scope="col"><?php echo _("Sent To"); ?></th>
    <th width="35%" class="sidebardk" scope="col"><?php echo _("Subject"); ?> </th>
    <th width="14%" class="sidebardk" scope="col"><?php echo _("Renewal Date"); ?> </th>
    <?php if ($_SESSION['valid_tech']) {?>
    <th width="6%" class="sidebardk" scope="col"><?php echo _("Edit"); ?> </th>
    <?php }?>
  </tr>
  <?php $tmp = 1;

while($row=mysql_fetch_array($result)) {
	$aid = $row["id"];
	$adate = $row["indate"];
	$aauthor = $row["author"];
        $asent_to = $row["sent_to"];
	$asubject = $row["subject"];
	$abody = $row["body"];
	$update = $row["up-date"];
	$tmp = $tmp+1;
	
?>
  <tr bgcolor="#FFFFCC" class="text">
    <td class="sidebarlt"><?php echo $row["id"]; ?>
      <div align="left"></div></td>
    <td class="sidebarlt"><div align="left"><?php echo $adate; ?></div></td>
    <td class="sidebarlt"><div align="left"><?php echo $aauthor; ?></div></td>
    <td class="sidebarlt"><div align="left"><?php echo $asent_to; ?></div></td>
    <td class="sidebarlt"><div align="left" ><a href="showann.php?myid=<?php echo $aid; ?>" > <?php echo $asubject; ?> </a> </td>
    <td class="sidebarlt"><?php echo $update; ?></td>
    <?php if ($_SESSION['valid_tech']) {?>
    <td class="sidebarlt"><div align="left"><a href="edit-announcement.php?typeid=1&amp;myid=<?php echo $aid; ?>"><?php echo _("Edit");?></a></td>
    <?php }?>
  <!--</tr><td colspan="3" class="sidebarlt"><div align="left" style="font-size: medium"><span class="style3 style5 style5 style3"><a href="showann.php?myid=<?php //echo $aid; ?>" > <?php //echo $asubject; ?> </a> </span>&nbsp;</div></td>
  -->
  
  <?php }	// close while
?>
</tr>
</table>
    
    <p><br />
    </p>
   <br />
    <p>&nbsp;</p>
    <!-- InstanceEndEditable --></div>
    <br class="clearFloat" />
  </div>
  <div id="footer">
    <p><a href="../index.php"><?php echo _("Home"); ?></a> | <a href="announcements.php" ><?php echo _("Announcements"); ?> </a> | <a href="http://its. /guides" target="Help" ><?php echo _("User Guides"); ?> </a> |<a href="../aliases.php" ><?php echo _("Email Aliases"); ?> </a> | <a href="http://its. /" target="Help"><?php echo _("ITS WebSite"); ?> </a>| <a href="http://its. /faqs" target="Help"><?php echo _("FAQs"); ?> </a> | <a href="http://its. /contact/about" target="Help"><?php echo _("Contact Us"); ?> </a> | <a href="../about.php" ><?php echo _("About"); ?> </a></p>
    <p>This site is copyright © 2013 The HelpDesk support Team<img src="http://www.justdreamweaver.com/templates/link/spacer.gif" width="1" /></p>
  </div>
  <!--The following code must be left in place and unaltered for free usage of this theme. If you wish to remove the links, contact us at http://www.justdreamweaver.com and get template pricing for a link-free template.-->
  <div id="credit">This <a href="http://www.justdreamweaver.com/dreamweaver-templates.html">free Dreamweaver template</a> created by <a href="http://www.justdreamweaver.com">JustDreamweaver.com</a></div>
</div>
</body>
<!-- InstanceEnd --></html>
