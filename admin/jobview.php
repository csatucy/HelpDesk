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
    
    
    
    
    
    <div id="content-right"><!-- InstanceBeginEditable name="EditRegion5" -->	
	   <?php 
     if (!$_SESSION['valid_tech'])
	{ $main="<META HTTP-EQUIV='refresh' content='0;URL=";
    $wtarget=$main."../index.php"."'>";
    echo $wtarget;
	 
     }
    else  
	{     
    
$author=0;
$author_ans=0;
include ("tinymce/tinyconfig.inc");
$jobID=$_GET["which"];
$which=$_GET["which"];

$sented_ID=$_GET["which"];

//Select the record from database
$sqltemp="select jobid,indate,subject,name,email,descr,solvedstate,urgency from jobs ";
$sqltemp=$sqltemp." where jobid=".$sented_ID;


$rstemp_query=mysql_query($sqltemp);
error();
$rstemp=mysql_fetch_array($rstemp_query);

$form_problemid=$rstemp["jobid"];
$form_subject=$rstemp["subject"];
$form_name=$rstemp["name"];
$form_email=$rstemp["email"];
$form_indate=$rstemp["indate"];
$form_descr2=$rstemp["descr"];
$user=$rstemp["email"];

$solved_state=$rstemp["solvedstate"];
$urgency=$rstemp["urgency"];
$form_email=$form_email."?Subject=Helpdesk Problem : ".$Sented_id."-".$form_subject;

//Elegxos gia ti katastash tou provlimatos 
    if ($solved_state=="0" )
    {
    
	   $stat="&nbsp;&nbsp;<img src='../pictures/closed.gif' alt='Pending Request'><font face='arial' color='red' size='1'><b>&nbsp;Pending</b></font>";
	   } 
	  
	   if (!$solved_state=="0") 
	  {
 $stat="&nbsp;&nbsp;<img src='../pictures/yellockfolder.gif' alt='Solved Request'><font face='arial' color='red' size='1'><b>&nbsp;Solved</b></font>";
    } 
	    
 $rstemp_query=mysql_query($sqltemp);
error();
$rstemp=mysql_fetch_array($rstemp_query);
$rstemp=null;
$username= ($_SESSION['valid_user']);

if (($username."@cs.ucy.ac.cy")==$user) 
{$author=1;}?>

<div align="center" class="logo">
<span class="text_header">
<?php 
echo _("Tasks view");
?>
</span>
</div>
<br />  
<link href="andry_styles.css" rel="stylesheet" type="text/css" />
<div align="center" >
  <?php //Elegxos an einai urgent emfanish eikonidiou
if ($urgency=="1")
{
  $urgstr="&nbsp;&nbsp;&nbsp;<img src='../pictures/hot.gif' alt='Urgent Request'><font face='arial' color='black' size=1>&nbsp;Urgent</font>";

} 
if ($urgency=="2")
{
  $urgstr="&nbsp;&nbsp;&nbsp;<img src='../pictures/urgent.GIF' alt='Urgent Request'><font face='arial' color='black' size=1>&nbsp;Urgent</font>";}




?>
  <strong><big><font color="#800000"><br />
  <?php echo $form_problemid; ?> : </font></big><?php echo $form_subject; ?>&nbsp;&nbsp;&nbsp;&nbsp;
  <font color="red">(<?php echo $stat; ?>)<?php echo $urgstr; ?></font></strong>
  
  </div>
<p align="center">

<?php //Elegxos an eimaste login san users

 if (!$_SESSION['valid_user']) { ?>
<br />

      <font size="4"><img src="../pictures/edit.gif" width="26" height="17" border="0" /></a></font><a href="login.php "
 align="left"> <?php echo _("Login to enter an answer to this problem"); ?> </a>   
        <?php }?>

         <span class="text"><font size="4"> </font></span>
</p>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="23%" class="tasks_sidebar"><?php echo _("JOB ASSIGNED to you"); ?></td>
    <td width="42%" class="tasks_sidebar"><div align="center"><?php echo _("by"); ?> </strong> <a href="mailto:%20<?php echo $form_email; ?>">
      <?php echo $form_name; ?> </a></div></td>
    <?php if ($author=="1") { ?> <td width="5%" class="tasks_sidebar"><a href="admin/edit_task.php?which=<?php echo $jobID;?>"><?php echo _("Edit"); ?></a></td> 
         <?php } ?>
         
   
    <td width="30%" align="right" class="tasks_sidebar"><?php echo _("Date Reported :"); echo $form_indate; ?></td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" bgcolor="#DACBC0" class="sidebarlt" align="left" ><table border="0" width="100%" height="5%">
        <tr> <?php echo $form_descr2; ?>
    </tr></table></td>
  </tr>
</table><br />


<?php $sqltemp="SELECT * FROM jobsassigned WHERE jobsassigned.jobid=$sented_ID ORDER BY assignedid DESC";
$rstemp_query=mysql_query($sqltemp);
error();
$rstemp=mysql_fetch_array($rstemp_query);
echo $reccount;
// Now lets grab all the records

$count=0;
if (!($rstemp==0))
{
  if ($count==0)
  {
?>

<table align="center" cellspacing="0" cellpadding="3">
		<tr>
		  <td align="center"><font face='arial' color='#800000' size='2'><b><?php echo _("Assigned to:"); ?> </b></font></td>
		
    <?php $count=1;
	$rstemp==0;
  } 
  $techname=$rstemp["techname"];
  $techemail=$rstemp["email"];
  $theString="<font color='black' size='1'>".$techname."</font>";
  $theString2="<font color='black' size='1'> (".$techemail.  "  )</font>";
  
?>
	
	  <td><font face='arial' color='black' size='2'><b><?php echo $theString; echo $theString2;?></b></font></td>
	</tr></table>

<?php } 

$rstemp_query=mysql_query($sqltemp);
$rstemp=mysql_fetch_array($rstemp_query);
$rstemp=null;
 
if (strlen("$techname")>0)
{
  $thename=$techname;
  $theemail=$techemail;
}
  else
{
  $thename=$name;
  $theemail=$email;
} 


// Epilogh records apo to database gia epilogh ton apantiseon
$query_Allid = "SELECT * FROM jobsanswers WHERE jobid =".$jobID;
$Allid = mysql_query($query_Allid, $helpdeskphp) or die(mysql_error());
$rstemp=mysql_fetch_array ($Allid);

$count=0;
while(!$rstemp==0)
{

$count=$count+1;
$id=$rstemp["id"];
$name=$rstemp["name_ans"];
$techemail=$rstemp["techemail"];
$subject=$rstemp["subject"];
$indate=$rstemp["indate_ans"];
$techdescr=$rstemp["techdescr"];
$email=$techemail."?Subject=Helpdesk Problem : ".$Sented_id."-".$form_subject;
$rstemp=mysql_fetch_array($Allid); 

if (($username."@cs.ucy.ac.cy")==$techemail) 
{$author_ans=1;}
 ?>
<table width="100%" border="0" align="center" bordercolor="#000000" class="sidebarlt">
<tr class="back">
<th width="100%" height="26"  scope="col">
<table border="0" width="100%" cellspacing="0" cellpadding="3">
<tr bgcolor="#CCCC99" >
<td width="24%" bgcolor="#CCCC99" class="tasks_menu" ><?php echo _("Answer"); ?></td>
<td width="41%" align="center" class="tasks_menu" >by  <a href="mailto:%20<?php echo $email; ?>">
<?php echo  $name;?></a></span> </td>
<?php if ($author_ans=="1") {?> <td width="5%" class="tasks_menu"><a href="edit.php?id=<?php echo $id;?>"><?php echo _("Edit"); ?></a></td> 
         <?php } ?>
        <td width="30%" align="right" class="tasks_menu" ><?php echo _("Date Reported :"); echo $indate; ?></td>
      </tr>
    </table></th>
  </tr>
  <tr class="sidebarlt">
   <th width="100%" scope="col"><?php echo $techdescr; ?></th>
  </tr>
</table>

<br />
<?php $author_ans=0;
}

$Allid = mysql_query($query_Allid, $helpdeskphp) or die(mysql_error());
$rstemp=@mysql_fetch_array($$Allid);

$rstemp=null;
$query_Allid22 = "SELECT * FROM jobs WHERE jobid =".$which; 
$Allid22 = mysql_query($query_Allid22, $helpdeskphp);
$row_Allid22 = mysql_fetch_assoc($Allid22);
$totalRows_Allid22 = mysql_num_rows($Allid22); 
$email2=$row_Allid22['email']; 
?>
<?php if ($_SESSION['valid_tech']) {  
// ean einai tehnikos logged in tote tha ton afisei na apantisei kai na thesei os solved ena provlima h na to kanei assign ston eayto tou  



$mail=$_SESSION['valid_user']."@cs.ucy.ac.cy"; 
$mySQL2="select * from technicians where techemail='".$mail."'";
$rstemp2_query=mysql_query($mySQL2);
error(); 
$rstemp2=mysql_fetch_array($rstemp2_query);

?>
<form action="admin/maketaskurgent.php" method="post" name="form1" id="form1">
  <div align="center">
    <input name="Urg" type="checkbox" value="ON" checked="checked" />
    <?php if ($urgency=="2"){ ?>
    <input type="submit" name="Submit2" value="Turn to normal state" /> 
    <?php }
  else {?>
    <input type="submit" name="Submit2" value="Make Urgent" />
    <?php } ?>
    <input name="jobID" type="hidden" id="problemID" value="<?php echo $jobID; ?>" />
    <input name="urgency" type="hidden" id="urgency" value="<?php echo $urgency; ?>" />
   </div>
</form>
 
 
<div align="left">
  <form action="jobanswer.php" method="post" name="FrontPage_Form1" class="sidebarlt" id="FrontPage_Form1" onsubmit="return FrontPage_Form1_Validator(this)">
    <div align="left"><strong>Name :
        <input name="techname" type="text" class="fieldbg" id="techname" size="50" input="input" />
    </strong><br />
    <br />
        <strong> Email&nbsp; :
        <?php $putmail=$_SESSION['valid_tech']."@cs.ucy.ac.cy"; ?>
        <input name="email" input="input" type="text" class="fieldbg" value="<?php echo $putmail; ?>" size="50" readonly="true" />
        <br />
        <br />
        <textarea cols="55" rows="10" name="descr"></textarea>
        <br />
  State of the problem :
  <input name="R1" type="radio" value="1" />
  Solved / Close.
  <input type="radio" value="0" name="R1" checked="checked" />
  Pending.<br />
  <br />
  Assign this problem to me:&nbsp;
  <input type="checkbox" name="auto" value="ON" />
  <span class="style23">
  <input type="submit" value="Submit" />
  <input type="reset" value="Clear" />
  </span>
  <input type="hidden" name="email2" value="<?php echo $email2 ?>" />
  <input name="jobID" type="hidden" id="jobID" value="<?php echo $jobID; ?>" />
      </strong> </div>    
    <!--webbot BOT="GeneratedScript" PREVIEW=" " startspan -->
          <script language="JavaScript" type="text/javascript"><!--
		
function FrontPage_Form1_Validator(theForm)
{
var content = tinyMCE.activeEditor.getContent(); 
theForm.descr.value=content;

  if (theForm.techname.value == "")
  {
    alert("Please enter your name.");
    theForm.techname.focus();
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
//--></script>
          <!--webbot BOT="GeneratedScript" endspan -->
     </form>  
</div>
     <?php }
	   ?>
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
<!-- InstanceEnd --></html><?php }
	   ?>
