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
  include ($_SESSION['directory_name'].'/tinymce/tinyconfig.inc');
  if (!(isset($_SESSION['valid_user'])))
     
  {
  $main="<META HTTP-EQUIV='refresh' content='0;URL=";
    $wtarget=$main."login.php"."'>";
    echo $wtarget;
 } 
  
 
  else 
  {
 $problemID=$_GET["which"];
 
$query_Allid = "SELECT * FROM problems WHERE problemid =".$problemID;
$Allid = mysql_query($query_Allid, $helpdeskphp) or die(mysql_error());
$rstemp=mysql_fetch_array ($Allid);

$count=0;
while(!$rstemp==0)
{

$count=$count+1;
$name=$rstemp["name"];
$email=$rstemp["email"];
$email2=$rstemp["email"];

$subject=$rstemp["subject"];
$indate=$rstemp["indate"];
$descr=$rstemp["descr"];
$urgent=$rstemp["urgent"];

$email=$techemail."?Subject=Helpdesk Problem : ".$Sented_id."-".$form_subject;
$rstemp=mysql_fetch_array($Allid); 
$username= ($_SESSION['valid_user']);
}

if (($username."@cs.ucy.ac.cy")==$email2) 
{ 
$author_ans=1;
}
else
{$author_ans=0; }


if ($author_ans==0){

echo "email".$techemail;
echo "author ans".$author_ans;

$main="<META HTTP-EQUIV='refresh' content='0;URL=";
    $wtarget=$main."login.php"."'>";
    echo $wtarget;
}
else
{
 
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

  if (theForm.descr.value == "")
  {
    alert("Please enter a value for the \"Description\" field.");
    theForm.descr.focus();
    return (false);
  }
  
    return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan -->

<form action="update_request.php" method="post" name="FrontPage_Form3" id="FrontPage_Form3" onsubmit="return FrontPage_Form3_Validator(this)">

  <table width="599" height="1" border="0" align="center" bordercolor="#000000">
  <tr class="sidebardk">
    <td width="593" align="center" height="21">
        <span class="text_header"><?php echo _("Edit your request"); ?>
               <input name="problemid"  type="hidden" value="<?php echo $problemID; ?>" />
        </strong></b></span>        </font></td>
  </tr>
  <tr class="sidebarlt">
    <td width="593" align="center" height="1" valign="top">
      <?php echo _("You can edit your posted answer any time. You can view the answers to still pending problems at the");?><a href="solved_pending.php"> <?php echo _("Request"); ?> &amp; <?php echo _("Answer section."); ?></a></td>
  </tr>

  <tr>
    <td><br />
      <table border="0" height="140" width="579" align="center">
		  <tr>
			<td height="21" align="left" nowrap="nowrap" class="back"><?php echo _("Name:");?></td>
			<td width="575" height="21" align="right" class="back"><div align="left">
			  <input type="text" name="name" size="50" tabindex="1" maxlength="50" value="<?php echo $name; ?>" />
			  <span class="error">*</span></div></td>
		  </tr>

		  <tr>
			  <td height="21" align="left" nowrap="nowrap" class="back">
				<?php echo _("Email:");?>			  </td>
			  <td height="21" align="right" nowrap="nowrap" class="back">
				 <div align="left">
				   <?php   $putmail=$_SESSION['valid_user']."@cs.ucy.ac.cy"; ?>
				  
				   
	  <input name="email" input="input" type="text" class="sidebardk_noborder_v2" value="<?php echo $putmail; ?>" size="50" readonly="true" />
				   
		          <span class="error">* </span></div></td>
		  </tr>
		  <tr>
            <td height="21" align="left" nowrap="nowrap" class="back"><?php echo _("Urgent Request:"); ?> </td>
		    <td height="21" align="left" nowrap="nowrap" class="back"><div align="left"><span class="error">Yes</span>
	            <input name="C1" type="checkbox" onclick="if (this.checked){alert('HELPDESK NOTICE: This option should be checked for requests that need immediate action {servers down, printers stuck, mailq stuck}, and where immediate action can be taken. If you use this button for requests where immediate action cannot be taken, then its use will be neutralized. ');this.value=1; } else if (!this.checked)this.value=0;" value='<?php echo $urgent==0;?>'  />
		      </div></td>
		    </tr>
		  <tr>
            <td height="21" align="left" nowrap="nowrap" class="back"><?php echo _("Subject of problem:"); ?></td>
		    <td height="21" align="right" nowrap="nowrap" class="back"><div align="left">
		      <input name="subject" type="text" tabindex="3" value="<?php echo $subject; ?>" size="50" />
		      <span class="error">*</span></div></td>
		    </tr>
		  <tr>
				<td width="575" align="center" height="21" colspan="2">
					   <div align="left" class="text_header"><br />
					       <?php echo _("Detailed description of your problem:"); ?></br>
					     </br>
					     <textarea cols="50" rows="12" name="descr" tabindex="4"><?php echo $descr ?></textarea>
                       </div></td>
		  </tr>
		  <tr>
  				  <td width="575" align="center" height="21" colspan="2">
		  				    
                    <div align="center">
  <input type="submit" value="<?php echo _("Save"); ?>" tabindex="5" />
  &nbsp;&nbsp;
  <input type="reset" value="<?php echo _("Cancel"); ?>" tabindex="5" />
                      <br />
                      <br />
                      <span class="note"><strong><?php echo _("Note") ?></strong> 
                      <?php echo _(": You will be notified at the email address you gave above, every time someone follows up or solves your request.")?></span> </div></td>
		  </tr>
		</table>
	</td>
</tr>
 <tr class="back">
    <td width="593" align="center" height="21">&nbsp;
        
  </td></tr>

</table>

</form>
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
<!-- InstanceEnd --></html><?php } }?>
