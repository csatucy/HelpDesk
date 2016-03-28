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
             
                <p align="center">
                  <font color="#990000" class="titlosGrante" ><b>New Features </b></font>      </p>
                 <p align="left"><br />
                  <font color="#990000" class="titlos"><b> Helpdesk v.1.2.p &amp; v.1.3.p <br />
                </b></font> </p>
           
        <ol>
          <li class="textintence">
            <div align="left"> Sorting menu options - When viewing the solved problems page the visitor is able to sort the page by time of answer or other options. <br /> 
            </div>
          </li>
          <li class="textintence">
            <div align="left"> Requests and answers shows both unsolved requests and last 30 solved. <br />
            </div>
          </li>
          <li class="textintence">
            <div align="left"> The Announcements system become once again part of the helpdesk. <br />
            </div>
          </li>
          <li class="textintence">
            <div align="left"> Search utility, searching the key term seperateley in announcements,answers and reported requests. <br />
            </div>
          </li>
					  
					
					      <li class="textintence">
					        <div align="left">The user have an option of seeing more than 30 problems per page, selecting between options (30,50,100,250,400,700,1000 per page).<br />
					        </div>
	      </li>
					      <li class="textintence">
					        <div align="left">Option for the user to login was placed on the front page.					        </div>
	      </li>  <?php if ($_SESSION['valid_admin'])
            {?>
					      <li class="textintence">
					        <div align="left">After a technician or administrator has logged in, the appropriate options appear as menu options.<br />
                            </div>
          </li>
					      <div align="left"> </div>
					      <div align="left"><span class="textintence"> </span></div>
          <li class="textintence">
            <div align="left"> Now the technician can assign a problem to himself without answering it first.<br />
              <br />
              <div align="left">
                <div align="left">            </div>
              </div>
            </div>
          </li>
          <li class="textintence">
            <div align="left"> When logged-in as Administrator/technician and choose to see a request, the answer window appears on the same page.Also this happens by entering an answer to a request.<br />
            </div>
          </li>  
          <li class="textintence">
            <div align="left">Administrators are able to re-assign a problem to another technician. <br />
            </div>
          </li>
          
              <?php } ?>
        </ol>
       <div >
              
                 <p align="left"><br />
                  <font color="#990000" class="titlos"><b> Helpdesk v.1.4.p <br />
                </b></font> </p>
      </div>
      <ol>
          <li class="textintence">
            <div align="left">The layout of the announcements, request and answers are now kept as when a user add the request, answer or announcement. (breaks, paragraphs etc.) <br />
</div>
          </li>
          <li class="textintence">
            <div align="left">Edit and review the email sent when a new announcement is placed. <br />
            </div>
          </li>
          <li class="textintence">
            <div align="left">The administrators are able to escalate an issue to urgent status.  The urgent issues escalated by the administrators (not the urgent  issues entered by users) are placed on top of the list.            <br />
            </div>
          </li>
          <li class="textintence">
            <div align="left">When a user adds a follow up comment on an <strong>already closed</strong> ticket, the ticket is automatically reopen and place on the administrator urgent list. <br />
            </div>
          </li>
      </ol>
        
        
         <div >
              
                 <p align="left"><br />
                  <font color="#990000" class="titlos"><b> Helpdesk v.2.0<br />
                </b></font> </p>
      </div>
        <ol class="textintence">
          <li >
            <div align="left">Major change to the graphical interface.<br />
</div>
          </li>
          <li >Translation of the interface messages to Greek language. (optional for every user)<br />
          </li>
          <li >
            <div align="left">The user is now able to edit his/hers posted request or reply.<br />
            </div>
          </li>
          <li >
            <div align="left">The timymce editor allow  proper formating wherever a user need to input text.<br />
            </div>
          </li>
          <li >
            <div align="left">The user is now able to post a private request, viewable only by him and administrators.  This is useful when posting sensitive  or confidential data. <br />
            </div>
          </li>
          <li >Implementation of an itnernal list of tasks viewable by technicians and administrators only, in order to help them  assign a job and watch the state of the job. (Easiest to manage and user friendly!! )  <br />
            </li>
      </ol>
        
        
        
        
          <div >
              
                 <p align="left"><br />
                  <font color="#990000" class="titlos"><b> Helpdesk v.2.1<br />
                </b></font> </p>
      </div>
        <ol class="textintence">
          <li >
            <div align="left">Bug fixes. (Chrome support, email notifications, announcements)<br />
</div>
          </li>
          <li >Secutiry fixes.<br />
          </li>
          <li >
            <div align="left">Implementation of HelpDesk analytics for ITS staff usage.<br />
            </div>
          </li>
          <li >
            <div align="left">Implementation of LDAP authentication instead of IMAP authantication used. <br />
            </div>
          </li>
          <li >
            <div align="left">Top and bottim menu links updated. <br />
            </div>
          </li>
  <li >
            <div align="left">Activate time appearance for request and andwers posted. <br />
            </div>
          </li>
         
      </ol>
        
        
        
        
        
        
        
        <p align="left" class="text"><em><b><u>It is our sincere hope that Helpdesk will continue to be the first point of contact for any computer-related problem you may have. </u></b></em></p>
      <font color="#990000" class="titlos"><b></b></font>


<title></title>
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
