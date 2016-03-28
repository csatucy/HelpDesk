<?php session_start();

$_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';

require_once(($_SESSION['directory_name'].'/configs/config.inc.php'));
require_once($_SESSION['directory_name'].'/Libs/common.lib.php');
?>
<?php require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php');   

$text=$_POST["text"];
$mySee="select max(problemid) from problems ";
$rstempsee_query=mysql_query($mySee);  
$rstempsee=@mysql_fetch_array($rstempsee_query);
$max=$rstempsee[0];
$rstempsee=null;



if (is_numeric($text)&&($text<=$max)&&($text>=4) )
{
 header("Location:../subjectview4.php?which=".$text);
}
else
//{if (!is_numeric($text))
{
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php session_start();
 (strncmp($_SERVER["HTTP_HOST"],"helpdesk", 8)== 0) ? $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'] : $_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
 session_start();

$_SESSION['directory_name'] = $_SERVER['DOCUMENT_ROOT'].'/phpHelpDesk';
require_once($_SESSION['directory_name'].'/Connections/helpdeskphp.php');
require ($_SESSION['directory_name'].'/configs/config.inc.php');
require ($_SESSION['directory_name'].'/Libs/common.lib.php');
//include ($_SESSION['directory_name'].'/lang/en.inc.php');
//include ($_SESSION['directory_name'].'/lang/el.inc.php');
require($_SESSION['directory_name'].'/configs/localization.php');
connectDB();
error();

$what=$_POST["what"];

?>

<title>Help Desk - Get answers to your questions - v. <?php echo $VERSION; ?> </title>


<style type="text/css" media="all">
<!--
@import url("../styles.css");
@import url("../andry_styles.css");
--></style>



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
    
    <ul class="level-0" id="cssmw">
      <li><span><a href="#">Home</a></span></li>
      <li><span><a href="#">Products</a></span>
        <ul class="level-1">
          <li><span><a href="#">Product 1</a></span></li>
          <li><span><a href="#">Product 2</a></span></li>
          <li><span><a href="#">Product 3</a></span>
            <ul class="level-2">
              <li><span><a href="#">Pricing</a></span></li>
              <li><span><a href="#">Specifications</a></span></li>
              <li><span><a href="#">Order Now</a></span></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><span><a href="#">Services</a></span>
        <ul class="level-1">
          <li><span><a href="#">Service 1</a></span></li>
          <li><span><a href="#">Service 2</a></span></li>
          <li><span><a href="#">Service 3</a></span>
            <ul class="level-2">
              <li><span><a href="#">Benefits</a></span></li>
              <li><span><a href="#">Pricing</a></span></li>
            </ul>
          </li>
        </ul>
      </li>

      <li><span><a href="#">Contact Us</a></span></li>
      <li><span><a href="http://www.justdreamweaver.com/dreamweaver-templates.html">Download Now</a></span></li>
    </ul>
    <script type="text/javascript">if(window.attachEvent) { window.attachEvent("onload", function() { cssmw.intializeMenu('cssmw'); }); } else if(window.addEventListener) { window.addEventListener("load", function() { cssmw.intializeMenu('cssmw'); }, true); }</script> 
  </div>
  
  
  <div id="contentWrapper">
    <div id="leftColumn1">
      <div id="leftColumnContent">
        <div align="center"><img src="../pictures/logo2.jpg" width="77" height="60" class="sidebarlt" /> <br />
            <br />
        </div>
        <div class="sidebarbox">
          <div class="sidebarboxtop menu"> <?php echo _("Menu:"); ?><br />
          </div>
          <div class="sidebarboxbottom"></div>
        </div>
        <ul>
          <li>
            <div align="left"> <a href="../problem_out.php"><?php echo _("Enter Request"); ?> </a> </div>
          </li>
          <li><a href="../solved_pending.php"><?php echo _("Requests  Answers"); ?> </a></li>
          <li><a href="../onlysolved.php"><?php echo _("Solved Problems"); ?> </a></li>
          <li><a href="../aliases.php"><?php echo _("Emai Aliases"); ?> </a></li>
          <li><a href="http://www2.cs.ucy.ac.cy/Computing" target="_blank"><?php echo _("Computing Guides"); ?> </a></li>
          <li><a href="../announcements/announcements.php"><?php echo _("Announcements"); ?> </a></li>
          <li><a href="../Key.php"><?php echo _("Search"); ?></a></li>
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
            <form action="../Search.php" method="post" name="FrontPage_Fom3" id="FrontPage_Fom3" onsubmit="return form1_Validator(this)" >
              <div align="left" class="sidebardk">
                <label class="text"><u><?php echo _("Quick Search:"); ?></u></label>
                <br />
                <input name="what" type="text" id="what" value="" size="10" />
                <br />
                <input type="submit" name="Submit" value="<?php echo _("Search"); ?>" />
              </div>
              </a>
            </form>
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
          <?php } ?>
        </ul>
      </div>
    </div>
    	<table width="716" border="0">
      <tr>
        <td width="50" height="35"><span class="style12">
  <label><a href="?locale=en_US">
              <input type="image" name="imageField" id="imageField" src="../pictures/en.gif" />
          </a></label>
          <label><a href="?locale=el_GR">
          <input type="image" name="imageField2" id="imageField2" src="../pictures/el.gif" />
          </a></label>
        
         </span></td>
        <td width="169">&nbsp;</td>
        <td width="406"><span class="style12">
          <?php  if ($_SESSION['valid_user'])
  {?>
<em><strong><?php echo("  "); echo _("You are logged in as: "); echo($_SESSION['valid_user']);?></strong></em> 
          <?php }
  else
  {?>
          <em><strong><?php echo _("You are viewing this page as a guest"); echo($valid_user); ?></strong></em> 
          <?php }?>
        </span></td>
        <td width="73">
        <?php  if ($_SESSION['valid_user'])
  {?>
<small><a href="../logout.php" class="sidebarlt"><?php echo _("Log Out"); ?></a></small><?php }  else { ?> <small><a href="../login.php" class="sidebarlt"><?php echo _("Login"); ?></a></small>

<?php }

?>        </td>
      </tr>
    </table>
    
    
    
    
    
    <div id="content-right">


<style type="text/css">
<!--
body {
	background-image: url(../pictures/back.gif);
}
-->
</style>

<style type="text/css">
<!--
.style16 {font-size: x-large}
-->
</style>


<br />
<span class="style16"><br />
<br />
</span>
<div align="center" class="error style16">
  <?php if(!is_numeric($text))
{ echo "<strong>Must be a valid request number. Try Again... </strong>"; }
 else
 if (($text>$max)||($text<33)){echo "Must be a valid request number between 4-".$max.". Try again...";}

 $main="<META HTTP-EQUIV='refresh' content='0;URL=";
  $wtarget=$main."../Search.php"."'>"; 
  echo $wtarget;
  ?>
</div>
    </div>
    <br class="clearFloat" />
  </div>
  <div id="footer">
    <p><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">Services</a> | <a href="#">About Us</a> | <a href="#">Contact Us</a> | <a href="#">Site Map</a> | <a href="#">Privacy</a></p>
    <p>This site is copyright © 2008 YourWebsiteName.com<img src="http://www.justdreamweaver.com/templates/link/spacer.gif" width="1" /></p>
  </div>
  <!--The following code must be left in place and unaltered for free usage of this theme. If you wish to remove the links, contact us at http://www.justdreamweaver.com and get template pricing for a link-free template.-->
  <div id="credit">This <a href="http://www.justdreamweaver.com/dreamweaver-templates.html">free Dreamweaver template</a> created by <a href="http://www.justdreamweaver.com">JustDreamweaver.com</a></div>
</div>
</body>
</html><?php } ?>
