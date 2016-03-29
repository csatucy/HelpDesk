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

<?php include ("tinymce/tinyconfig.inc");

$typeid=$_GET['typeid'];

if (($typeid == "1") && ($_SESSION['valid_tech']))
{

$maillist=array();
  ?>
<form action="announce_update.php" method="post" onsubmit="return ValidateEntry(this)" name="Form1" id="Form1" >
  
<table border="0"  width="579" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td width="575" align="center" bgcolor="#663300" height="21" class="sidebardk">
        <?php echo _("Create a new  announcement"); ?>
    </td>
  </tr>
  <tr>
    <td width="575" align="center" valign="top" class="sidebarlt">
   <?php echo _("You can make an announcement, at any time, by filling out the following form. The announcement will be published on the announcement table and  emailed to the groups you select in the form."); ?>
  
    </td>
  </tr>

 <tr>
   	 
            <td align="center" nowrap="nowrap" class="text_header"><?php echo _("Please fill out"); ?>:             
            </td>
          

 </tr>

 <tr>
    <td>
		<table border="0"  width="579" align="center" >
		  <tr class="back" >
			<td align="left" height="21" nowrap="nowrap"><?php echo _("Name"); ?>:</b></font>			</td>
			<td width="575" align="right" height="21">
			   <div align="left">
			     <input type="text" name="authorname" size="50" maxlength="50" value="<?php echo $thename; ?>" />
			     <font face="Arial" color="red" size="4">*</font>			        </div></td>
		  </tr>

		  <tr class="back">
			  <td align="left" height="21" nowrap="nowrap">
				 <?php echo _("Email"); ?>:</b></font>			  </td>
			  <td align="right" height="21" nowrap="nowrap">
				 <div align="left">
				   <?php if (strlen($theemail)==0)
  {

    $putmail=$_SESSION['valid_tech']."@ ";
  }
    else
  {

    $putmail=$theemail;
  } 

?>
				   
				   <input type="text" name="authoremail" size="50" maxlength="50" readonly="readonly"" value="<?php echo $putmail; ?>" />
				   <font face="Arial" color="red" size="4">*</font><br />
			      <span class="note"><?php echo _("Use the style 'username at  '"); ?> </span></div></td>
		  </tr>
		   <tr class="back">
		  			  <td align="left" height="21" nowrap="nowrap"><?php echo _("Subject"); ?>:	  			  </td>
		  			  <td align="right" height="21" nowrap="nowrap">
		  				 <div align="left">
		  				   <input type="text" name="subject" size="50" value="" />
  				      <font face="Arial" color="red" size="4">*</font>  				         </div></td>
		  </tr>
		  
		  <tr class="back">
			  <td  align="left">
				 <?php echo _("Sent to") ?>:  </td>
			  
			  <td height="21" align="right" nowrap="nowrap">
				 <div align="left">
				   <table border="1">
				     <tr class="back">
				       <td colspan="3" align="right" nowrap="nowrap">
				         <font color="red" face="arial" size="2"><?php echo _("All department members"); ?></font>
				         <font size="2">
				           <input name="Csall" type="checkbox"  onclick="Unchecktherest();" value="csall@ " checked="checked" />			     		        
			              </font></td>
		     	       </tr>
				     
				     <tr>
				       <td align="right" nowrap="nowrap">
				         <font size="2">				       <font color="red" face="arial"><?php echo _("Faculty members");?></font></font>
				         <font size="2">
				           <input name="maillist[]" type="checkbox" onclick="UnchecktheAll();" value="csfaculty@ " />
			              </font></td>
						    
			     	 <td align="right" nowrap="nowrap"><font color="red" face="arial" size="2" ><?php echo _("Research staff"); ?> </font>
			     	   <font size="2">
			     	     <input type="checkbox" name="maillist[]"   value="csresearch@ " onclick="UnchecktheAll();" />
			     	     </font></td>
					       
			     	 <td align="right" nowrap="nowrap"><font color="red" face="arial" size="2" ><?php echo _("Special scientists"); ?></font>
			     	   <font size="2">
			     	     <input type="checkbox" name="maillist[]"  value="cstspecial@ " onclick="UnchecktheAll();" />			     	   	       </font></td>
			     	    </tr>
				     
				     <tr>
				       <td align="right" nowrap="nowrap">
				         <font color="#FF0000" size="2" face="Arial"><?php echo _("Graduate Students"); ?>
				           <input name="maillist[]" type="checkbox" id="C7" value="cspg@ "  onclick="UnchecktheAll();" />
			              </font>	     	          </td>
			     	     <td align="right" nowrap="nowrap">
			     	       <font color="#FF0000" size="2" face="Arial"><?php echo _("Undergrad. students"); ?>			     	    
		     	            <input name="maillist[]" type="checkbox" id="C8" value="undergrad@ "  onclick="UnchecktheAll();" />
	     	              </font>	     	          </td>
			     	     <td align="right" nowrap="nowrap">
			     	       <font color="red" face="arial" size="2" ><?php echo _("Administr. staff"); ?> </font>
			     	       <font size="2">
		     	            <input type="checkbox" name="maillist[]" value="csstaff@ "  onclick="UnchecktheAll();" />
	     	              </font></td>
			     	</tr><tr>
			     	  <td align="right" nowrap="nowrap">
			     	    <font color="#FF0000" size="2" face="Arial"><?php echo _("Master Students"); ?>
			     	      <input name="maillist[]" type="checkbox" id="C7" value="csmsc@ "  onclick="UnchecktheAll();" />
			     	      </font>	     	          </td>
			     	     <td align="right" nowrap="nowrap">
			     	       <font color="#FF0000" size="2" face="Arial"><?php echo _("PhD students"); ?>			     	    
		     	            <input name="maillist[]" type="checkbox" id="C8" value="csphd@ "  onclick="UnchecktheAll();" />
	     	              </font>	     	          </td>
			     	     <td align="right" nowrap="nowrap">
			     	       <font color="red" face="arial" size="2"> <?php echo _("Support"); ?>  </font>
			     	       <font size="2">
		     	            <input type="checkbox" name="maillist[]" value="cssupport@ " onclick="UnchecktheAll();" />
	     	              </font></td>
    
			     	</tr>
				      </table>
			      </div></td>
		  </tr>

		  <tr>
				<td width="575" align="center" height="21" colspan="2">
					 
					   <span class="text_header"><?php echo _("Announcement details"); ?>:</span></br></br>
				    <textarea name="body" cols="80" rows="20" tabindex="4" value=""></textarea>				</td>
		  </tr>
		  <tr>
		  				<td width="575" align="center" height="21" colspan="2">
		  				    <input type="submit" value="<?php echo _("Submit Announcement"); ?>" />
							<input type="reset" value="<?php echo _("Reset Form"); ?> "/> 		  				</td>
		  </tr>
		</table>
	</td>
</tr>
 </table>
</form>
<?php }
  else
{

require("../configs/config.inc.php"); 
require("../Libs/common.lib.php"); 

connectDB();

$mySQL="SELECT * FROM announce ";

$rstemp_query=mysql_query($mySQL);  
$rstemp=mysql_fetch_array($rstemp_query);

?>

<table border="0" width="100%">
  <tr>
    <table border="0" width="100%" align="center">
      
<?php // Now lets grab all the records

  $count=0;
while(!($rstemp==0))
  {

    $count=$count+1;
    $subject=$rstemp["subject"];
    $authorname=$rstemp["authorname"];
    $authoremail=$rstemp["authoremail"];
    $indate=$rstemp["indate"];
    $id=$rstemp["id"];

/***************************************   */
    if (($count_MOD2)==0)
    {
?>
      <tr>
        <td bgcolor="#DAF8FE" align="center"><small><?php echo $indate; ?></small></td>
        <td bgcolor="#DAF8FE" align="left"><a href="showann.php?myid=<?php echo $id; ?>"><font face="arial" size="2" color="blue"><b><?php echo $subject; ?></b></font></a></td>
        <td  bgcolor="#DAF8FE" align="left"><font face="arial" size="2" color="black"><?php echo $authorname; ?></font></td>
      </tr>
<?php }
      else
    {
?>
      <tr>
        <td bgcolor="#B8DCDC" align="center"><small><?php echo $indate; ?></small>
        </td>
       <td bgcolor="#B8DCDC" align="left"><a href="showann.php?myid=<?php echo $id; ?>"><font face="arial" size="2" color="blue"><b><?php echo $subject; ?></b></font></a></td>
        <td bgcolor="#B8DCDC" align="left"><font face="arial" size="2" color="black"><?php echo $authorname; ?></font></td>
     </tr>
<?php } 

    $rstemp=mysql_fetch_array($rstemp_query);

  } 

$rstemp_query=mysql_query($mySQ);  
//$rstemp=mysql_fetch_array($rstemp_query);

$rstemp=null;

?>
    </table>
  </tr>
</table>
<?php } ?>




<?php $typeid=$_GET["typeid"];

if ($typeid==1)
{
?>
<script language="JavaScript" type="text/javascript">
<!--
function ValidateEntry(theForm)
{

var content = tinyMCE.activeEditor.getContent(); 
theForm.body.value=content;

  if (theForm.authorname.value == "")
  {
    alert("Please enter a value for the \"Full Name\" field.");
    theForm.authorname.focus();
    return (false);
  }

  if ((theForm.authoremail.value == "") || (theForm.authoremail.value == "@ucy.ac.cy"))
  {
    alert("Please enter a valid \"Email Address\".");
    theForm.authoremail.focus();
    return (false);
  }

  if (theForm.subject.value == "")
  {
    alert("Please enter a value for the \"Subject of Announcement\" field.");
    theForm.subject.focus();
    return (false);
  }

  if (theForm.body.value.length < 1)
  {
    alert("Please enter the \"Description\" of the Announcement.");
    theForm.body.focus();
    return (false);
  }
  return (true);
}

function buildArray()
{
	var a = buildArray.arguments;
	for (i=0; i<a.length; i++)
	{  this[i] = a[i]; }
	this.length = a.length;
}

var urls1 = new buildArray("","announcement.php", "helpdesk.php");

function go(which, num, win)
{

	n = which.selectedIndex;
	if (n != 0)
	{   var url = eval("urls" + num + "[n]")
 		location.href = url;
  	}

}
function Unchecktherest()
{
  for (var i=0;i<document.Form1.elements.length;i++)
  {
    var e = document.Form1.elements[i];

    if (e.name != 'Csall')
      e.checked = document.Form1.Csall.unchecked;
  }
  return true;
}
function CheckAll()
  {
  for (var i=0;i<document.Form1.elements.length;i++)
    {
    var e = document.Form1.elements[i];

    if (e.name != 'Csall')
      e.checked = document.Form1.Csall.checked;
    }
    return true;
  }

function UnchecktheAll()
{
  var uncheck = 0;
  for (var i=0;i<document.Form1.elements.length;i++)
  {
      var e = document.Form1.elements[i];
      if ((!e.checked) && (e.name != 'Csall'))
       {   uncheck = 1; }
  }
  for (var i=0;i<document.Form1.elements.length;i++)
  {
	  var e = document.Form1.elements[i];
	  if ((e.name == 'Csall') && (uncheck==1))
	     {   e.checked = false;  }
   }
   var counter = 0;
   for (var i=0;i<document.Form1.elements.length;i++)
   {
      var e = document.Form1.elements[i];
      if ((e.checked) && (e.name != 'Csall'))
       { counter = counter + 1; }
   }

   for (var i=0;i<document.Form1.elements.length;i++)
   {
	      var e = document.Form1.elements[i];
	      if ((e.name == 'Csall') && ( (counter==13) || (counter==9)))
	       {   e.checked = true; 
		   Unchecktherest(); }
    }

    return true;
}
// -->
</script>
<?php }
  else
{
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

var urls1 = new buildArray("","announcement.php?typeid=1", "helpdesk.php");

function go(which, num, win)
{

	n = which.selectedIndex;
	if (n != 0)
	{   var url = eval("urls" + num + "[n]")
 		location.href = url;
  	}

}

function CheckAll()
  {
  for (var i=0;i<document.Form1.elements.length;i++)
    {
    var e = document.Form1.elements[i];
    if (e.name != 'Call')
      e.checked = document.Form1.Call.checked;
    }
    return true;
  }


// -->

// -->
</script>

<?php } ?>

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
