<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/techTemplate.dwt" codeOutsideHTMLIsLocked="false" -->
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
	   <div align="center"><?php 
    
      
     if (!$_SESSION['valid_tech'])
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
	    


         <span class="back" style="font-size: 24px">Welcome back <b><?php echo ($_SESSION['valid_tech']);?></b></font><font color="#800000" face="arial"><b>!</b></font>  Technicians Control Site</span><br />
         <br />
        </div>

      
       <table border="2" align="center" cellpadding="2" cellspacing="2" bordercolor="#00FFFF">
  <tr class="sidebardk_noborder_v2">
    <td ><a href="techunassigned.php"><?php echo _("Unassigned Problems Pool"); ?></a></td>
    <td ><a href="tasks_pending.php"><?php echo _("View All Tasks"); ?></a></td>
      <td ><a href="techtesting.php"><?php echo _("View All assigned to Me"); ?></a></td>
      <td ><a href="tasks_solved.php"><?php echo _("Solved Tasks"); ?></a></td>
    </tr>
</table>

	  
	  
	  <!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --></h1>
      
      <!-- InstanceBeginEditable name="EditRegion1" -->
        <div align="center">
         
		  
		   
                    
          <?php $mail=$_SESSION['valid_user']."@cs.ucy.ac.cy"; 

$mySQL2="select * from technicians ";
$mySQL2=$mySQL2."where techemail='".$mail."'";
$rstemp2_query=mysql_query($mySQL2);
error(); 
$rstemp2=mysql_fetch_array($rstemp2_query);



$mySQLx="select * from problems, assigned ";
$mySQLx=$mySQLx."where problems.assigned=1 and problems.solvedstate=0 and assigned.problemid=problems.problemid and assigned.email='".$mail."'";
  $mySQLx=$mySQLx." ORDER BY problems.problemid DESC";
$rstempx_query=mysql_query($mySQLx);  
error();
$rstempx=mysql_fetch_array($rstempx_query);


$jobmySQLx="select * from jobs, jobsassigned ";
$jobmySQLx=$jobmySQLx."where jobs.assigned=1 and jobs.solvedstate=0 and jobsassigned.jobid=jobs.jobid and jobsassigned.email='".$mail."'";
  $jobmySQLx=$jobmySQLx." ORDER BY jobs.jobid DESC";
  
$jobrstempx_query=mysql_query($jobmySQLx);  
error();
$jobrstempx=mysql_fetch_array($jobrstempx_query);



$techlogin=$_POST["techlogin"];
$techemail=$_POST["techemail"];
  

$mySQL="SELECT * FROM technicians WHERE techlogin='".$_SESSION['valid_user']."' ";
$rstemp_query=@mysql_query(($mySQL),$conntemp);
$rstemp=@mysql_fetch_array($rstemp_query);
$count=0;

while(!($rstemp==0))

  $techlogin_session=$techlogin;
  $techemail_session=$techemail;
  //$passwd_session=$passwd;
  $techname_session=$techname;
  $leveltech_session=2;
  $leveltech_session=0;

 $email=$_SESSION['valid_user']."@cs.ucy.ac.cy";
 $mySQL2="select * from technicians, assigned ";
 $mySQL2=$mySQL2."where assigned.email='".$email."' AND technicians.techlogin='".$_SESSION['valid_user']."'";



?>
        </span></span></big></span>
         <span class="textintence">Department Problems assigned to you still Pending Or Unsolved </span><br />
      </div>
      <div align="center"></div>
        <div align="center">
        <center>
        </center>
      </div>
        
     
      <table  width="100%" align="center" height="42">
        <tr  class="sidebardk_noborder" >
          <td  width="7%">No</td>
          <td  width="5%"  align="center" >State</td>
          <td  width="32%" >Topic</td>
          <td  width="17%" >Originator</td>
          <td  width="15%" align="center" >Date</td>
          <td  width="24%" >Replies From</td>
        </tr>
        <?php // Now lets grab all the records

  $count=0;
 
while(!($rstempx==0))
  {
$count=$count+1;
    $problemid=$rstempx["problemid"];
    $form_subject=$rstempx["subject"]; 
	$form_name=$rstempx["name"];
    $form_indate=$rstempx["indate"];
    $urgency=$rstempx["urgency"];
   
    $mySQLReplies="select * from answers where problemid=".$problemid." ORDER BY answerid DESC";
    
    $mySQLstate="select * from answers where problemid=".$problemid." ORDER BY answerid DESC";


$rsReplies_query=mysql_query($mySQLReplies);    

$rsReplies=mysql_fetch_array($rsReplies_query);
$rsstate_query=mysql_query($mySQLstate);    
$rsstate=mysql_fetch_array($rsstate_query);

    



?>
        <?php // if (($count$MOD2)==0)
    {
?>
        <tr bgcolor="#FFFFCC" align="center">
          <td  height="100%" valign="top" class="sidebarlt">
            <?php echo $problemid; ?>
          </td>
      <td  height="100%" class="sidebarlt"  >
              <?php $flag2=0;
      $statement=0;
while(!($rsstate==0))
      {

        if ($flag2==0)
        {

          $statement=$rsstate["solvedstate"];
          $tech=$rsstate["name"];
          $flag2=1;
        } //end if

        $rsstate=mysql_fetch_array($rsstate_query);

      } //end while(!($rsstate==0))

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
         echo "<img src='../pictures/closed.gif' alt='Pending or Unsolved by Technician' >";
		 }
     

?>
              <?php $IDfield="problemid";
  $scriptresponder="../subjectview4.php"; ?>                </td>
          <td height="100%" class="sidebarlt"><?php $my_link=$scriptresponder."?which=".$problemid;  ?>
            <div align="left"><a href="<?php echo $my_link;  ?> ">
              <?php echo $form_subject; ?>
            </a></div></td>
          <td height="100%" class="sidebarlt"> 
		 
            <?php echo $form_name; ?>
         </td>
          <td  height="100%" align="center" class="sidebarlt">
            <?php echo $form_indate; ?>
          </td>
          <td height="100%" class="sidebarlt">
		  
            <?php $flag=1;
					  
//while(!($rsReplies==0))
 
while($rsReplies)
      {
	  
        $flag=2;
        $reply_name=$rsReplies["name_ans"];
        $reply_email=$rsReplies["techemail"];
        $indate2=$rsReplies["indate_ans"];
        echo  $reply_name.", ".$indate2."<br>";
$rsReplies=mysql_fetch_array($rsReplies_query);
       

      } 
      if ($flag==1)
      {

        echo "<center><font color='#800080'>No Answer</font></center>";
      } 
?>
         </td>
        </tr>
        <?php } ?>
        <?php $rstempx=mysql_fetch_array($rstempx_query);

  } 

$rstempx_query=mysql_query($mySQLx);  
$rstempx=mysql_fetch_array($rstempx_query);

  $rstempx=null;


?>
      </table>
      <div align="center"><br />
        
      <span class="textintence">Tasks assigned to you still Pending Or Unsolved      </span></div>
      <table border="0" width="100%" align="center" height="42">
        <tr class="tasks_menu" >
        
          <td  width="7%" >No</td>
          <td  width="5%"  align="center">State</td>
          <td  width="32%">Topic</td>
          <td  width="17%">Originator</td>
          <td  width="15%" align="center">Date</td>
          <td  width="24%" >Replies From</td>
        </tr>
        <?php // Now lets grab all the records

  $jobcount=0;
 
while(!($jobrstempx==0))
  {
$jobcount=$jobcount+1;
    $jobid=$jobrstempx["jobid"];
    $jobform_subject=$jobrstempx["subject"]; 
	$jobform_name=$jobrstempx["name"];
    $jobform_indate=$jobrstempx["indate"];
    $joburgency=$jobrstempx["urgency"];
   
    $jobReplies="select * from jobsanswers where jobid=".$jobid." ORDER BY id DESC";
    $jobstate="select * from jobsanswers where jobid=".$jobid." ORDER BY id DESC";


$jobReplies_query=mysql_query($jobReplies);    
$jobReplies=mysql_fetch_array($jobReplies_query);
$jobstate_query=mysql_query($jobstate);    
$jobstate=mysql_fetch_array($jobstate_query);

    



?>
        <?php // if (($count$MOD2)==0)
    {
?>
        <tr bgcolor="#FFFFCC" align="center" class="sidebarlt">
          <td  height="100%" valign="top" class="sidebarlt">
            <?php echo $jobid; ?>           </td>
          <td  height="100%" class="sidebarlt"  ><?php $jobflag2=0;
      $jobstatement=0;
while(!($jobstate==0))
      {

        if ($jobflag2==0)
        {

          $jobstatement=$jobstate["solvedstate"];
          $jobtech=$jobstate["name"];
          $jobflag2=1;
        } //end if

       $jobstate=mysql_fetch_array($jobstate_query);

      } //end while(!($rsstate==0))

      if ($joburgency=="1") 
      {

        echo "<img src='../pictures/hot.gif' alt='Urgent Problem! - Administrator notified via email' >";
      } 

 if ($joburgency=="2") 
      {

        echo "<img src='../pictures/urgent.GIF' >";
      } 



      if ($jobstatement=="0")
      {
	
  echo "<img  src='../pictures/closed.gif' alt='Pending or Unsolved by Technician' >";}
      

else
     {  
         echo "<img src='../pictures/closed.gif' alt='Pending or Unsolved by Technician' >";
		 }
     

 $jobIDfield="jobid";
  $jobscriptresponder="jobview.php"; ?>          </td>
        <td height="100%" class="sidebarlt"><?php $my_link=$jobscriptresponder."?which=".$jobid; ?>
          <div align="left"><a href="<?php echo $my_link;  ?> ">
                <?php echo $jobform_subject; ?>
            </a></div></td>
          <td height="100%" class="sidebarlt">
            <?php echo $jobform_name; ?>           </td>
          <td  height="100%" align="center" class="sidebarlt">
            <?php echo $jobform_indate; ?>           </td>
          <td height="100%" class="sidebarlt">
            <?php $jobflag=1;
					  
//while(!($rsReplies==0))
 
while($jobReplies)
      {
	  
        $jobflag=2;
        $jobreply_name=$jobReplies["name_ans"];
        $jobreply_email=$jobReplies["techemail"];
        $jobindate2=$jobReplies["indate_ans"];
        echo  $jobreply_name.", ".$jobindate2."<br>";
$jobReplies=mysql_fetch_array($jobReplies_query);
       

      } 
      if ($jobflag==1)
      {

        echo "<center><font color='#800080'>No Answer</font></center>";
      } 
?>          </td>
        </tr>
        <?php } ?>
        <?php $jobrstempx=mysql_fetch_array($jobrstempx_query);

  } 


$jobrstempx_query=mysql_query($jobmySQLx);  
$jobrstempx=mysql_fetch_array($jobrstempx_query);

 $jobrstempx=null;

?>
      </table>
      <br />
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
<!-- InstanceEnd --></html>
<?php } ?>
