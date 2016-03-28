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
	
<?php

$findTechnicians="SELECT `techemail` FROM `technicians`";
$find_Tech_query=mysql_query($findTechnicians);
error();
//$metra=0;

//$array=array();
//while($find_Tech_result = mysql_fetch_assoc($find_Tech_query)){
//	$array[$metra] = $find_Tech_result['techemail'];
//	$metra=$metra+1;
//}
//print_r($array);


$author=0;

$month = date("m");
$year = date("Y");

$today = date("Y-m-d");
$last2=$month-1;
$last=("$year-$last2-0");
$prev=12;

//Epilogh stoixeion gia ta problems pou den einai lymena kai sorting
$mySQL="select * from problems where problems.solvedstate=0 and (problems.urgency=0 or problems.urgency=1) ";
 if (($_GET['menu_sort']==0)&&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY problems.problemid  DESC";}
   
if (($_GET['menu_sort']==0)&&($_GET['menu_sort2']==1) )                         //by id
     {$mySQL=$mySQL." ORDER BY problems.problemid  ASC";}
    
if (($_GET['menu_sort']==1) &&($_GET['menu_sort2']==1) )                    //by urgency state
    {$mySQL=$mySQL." ORDER BY problems.urgency  ASC ";}
	 
if (($_GET['menu_sort']==1) &&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY problems.urgency  DESC";}
  
if (($_GET['menu_sort']==2) &&($_GET['menu_sort2']==1) )                     //by topic/subject
     {$mySQL=$mySQL." ORDER BY problems.subject  ASC";}
      if (($_GET['menu_sort']==2) &&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY problems.subject  DESC";}
  
    if (($_GET['menu_sort']==3) &&($_GET['menu_sort2']==1) )                  //by originator
     {$mySQL=$mySQL." ORDER BY problems.name  ASC";}
      if (($_GET['menu_sort']==3) &&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY problems.name DESC";}
  
   if (($_GET['menu_sort']==4) &&($_GET['menu_sort2']==1) )                  //by date
     {$mySQL=$mySQL." ORDER BY problems.indate  ASC";}
      if (($_GET['menu_sort']==4) &&($_GET['menu_sort2']==0) )
     {$mySQL=$mySQL." ORDER BY problems.indate DESC";}
 															  
	$IDfield="problemid";
    $scriptresponder="subjectview4.php";
              
    $rstemp_query=mysql_query($mySQL);
    error();
    $rstemp=mysql_fetch_array($rstemp_query);
									

//Epilogh last 30 problems solved
$mySQL2="SELECT * FROM answers, problems WHERE problems.problemid = answers.problemid AND problems.solvedstate = answers.answerid
ORDER BY answers.answerid DESC LIMIT 0 , 30"; 
   $rstemp_query2=mysql_query($mySQL2);
    error();
   $rstemp2=mysql_fetch_array($rstemp_query2);

//Epilogh Admin_URGENT problems 
$UrgentSQL="select * from problems where problems.urgency= 2 AND problems.solvedstate=0 ORDER BY problems.problemid DESC "; 
   $UrgentQuery=mysql_query($UrgentSQL);
    error();
   $Urg=mysql_fetch_array($UrgentQuery);

                
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
     var urls1 = new buildArray("", "#solvedexpl","onlysolved.php","#expl","index.php");

function go(which, num, win)
{
	n = which.selectedIndex;
	if (n != 0)
	{   
		var url = eval("urls" + num + "[n]")
 		location.href = url;
  	}
}
// -->
</script>

<link href="andry_styles.css" rel="stylesheet" type="text/css" />
      <a name="topi" id="topi"></a>
      <form>
        <table width="100%" border="0" bgcolor="#FFEEDD" >
                   
         <tr class="back" >
		  <td height="100%" colspan="8" align="center" class="text_header" color="#FFFFFF" size="4"><?php echo _("Requests"); ?> &amp; <?php echo _("Answers") ; ?></td> 
         </tr>
		   <tr bgcolor="#FFEEDD" class="sidebarlt" >
		       <td height="100%" colspan="8" class="sidebarlt"><?php echo _("This page displays problems and requests that are still pending. To see the solved problems, or the explanation of the icons, select the appropriate option from the menu below.");?></td>
          </tr>
		  <?php if (!$Urg==0) { ?>
        			    
		     <tr class="textintence" >
		       <td height="100%" colspan="8" class="fieldbg style1"><div align="center"><?php echo _("Extra Urgent Problems"); ?></div></td> 
		     </tr>
			   
		     <tr class="textintence" >
                <td width="5%" height="100%" class="sidebardk" ><?php echo _("No");?></td>
               <td width="5%" height="100%" align="center" class="sidebardk"><?php echo _("State");?></td>
               <td width="38%"  height="100%" class="sidebardk"><?php echo _("Topic");?> </td>
               <td width="16%"  height="100%" class="sidebardk" ><?php echo _("Originator");?></td>
               <td width="12%"  height="100%" align="center" class="sidebardk"><?php echo _("Date");?></td>
               <td width="26%"  height="100%" class="sidebardk"><?php echo _("Replies From");?></td>
<?php    if ($_SESSION['valid_admin']) { ?> <td width="26%"  height="100%" colspan="2" class="sidebardk"><?php echo _("Response");?></td><?php } ?>
          </tr>
		
		  <?php // Now lets grab all the records gia ta urgent by administrator problems
$count=0;
while(!$Urg==0)
{
$count=$count+1;
  $problemid1=$Urg["problemid"];
  $form_subject1=$Urg["subject"];
  $form_indate1=$Urg["indate"];
 $form_intime1=$Urg["intime"];
  $form_name1=$Urg["name"];
  $urgency1=$Urg["urgency"];
 $private=$Urg["private"];
 $intime=$Urg["intime"];

  $mySQLreplies1="select * from answers where problemid=$problemid1 ORDER BY answerid DESC";
  $mySQLstate1="select * from problems where problemid=$problemid1 ORDER BY answerid DESC";
 
$rsReplies_query1=mysql_query($mySQLreplies1);  
error();
$rsReplies1=mysql_fetch_array($rsReplies_query1);
$rsstate_query1=mysql_query($mySQLstate1);  
$rsstate1=mysql_fetch_array($rsstate_query1);


?>

  <tr  bgcolor="#F7F9D9">                              
    <td height="20" align="center" class="sidebarlt">
                  <?php echo $problemid1; ?>                </td>
                <td  height="20" align="center" class="sidebarlt"><?php $flag2=0;
    $statement=0;
while(!($rsstate1==0))
    {
      if ($flag2==0)
      {
        $statement=$rsstate["solvedstate"];
        $tech=$rsstate["techname"];
        $flag2=1;
      } 
      $rsstate1=mysql_fetch_array($rsstate_query);
    } 
	 

    if ($statement=="0")
	     {
     	  echo "<img  src='pictures/closed.gif' alt='pending' title='pending' >";
	   } 
	  
	   if ($urgency1=="1")  
	  {

      echo "<img src='pictures/hot.gif' alt='urgent' title='urgent' >";
	}
	 if ($urgency1=="2")
	
    {
       echo "<img  src='pictures/urgent.gif' alt='urgent' title='urgent' >";
    } 
	if ($private=="1")
	
    {
       echo "<img  src='pictures/private.gif' alt='private' title='private' >";
    } 
	 
	?></td>
                <td height="20" valign="middle" bgcolor="#FFFFCC" class="sidebarlt"><div align="left">
                  <?php $my_link=$scriptresponder."?which=".$Urg["problemid"]; ?>
                  <a href="<?php echo $my_link; ?>">
                    <?php echo $form_subject1; ?>
                  </a></div></td>
                <td  height="20" align="left"  bgcolor="#FFFFCC" class="sidebarlt">
                  <?php echo $form_name1; ?>                </td>
                <td height="20" align="center" valign="middel"  class="sidebarlt">
                         <?php     echo $form_indate1; ?><br /> <?php   if ($form_intime1!='00:00:00') {						
						    echo "<center><font color='#999999' size='-3'>$form_intime1</font></center>"; }?>                  </td>
                <td height="20"  align="left" class="sidebarlt" style="font-size: 11px" >
                 <span style="font-size: 11px">
                  <?php $flag=0;
    $countH=0;
while(!($rsReplies1==0))
    {

      $flag=1;
      $reply_name1=$rsReplies1["name_ans"];
      $reply_email=$rsReplies1["techemail"];
      $indate2=$rsReplies1["indate_ans"];
	  $intime_ans=$rsReplies1["intime_ans"];
	   $theString=    $reply_name1."<br>";
	  
	   if ($intime_ans!='00:00:00') {						
						 $theString2=   $indate2." (".$intime_ans.")<br>";    }
						 else
						 {$theString2=   $indate2;}
	  
	  
      $count2=0;
while(($countH>$count2))
      {

        $theString=" ".$theString;
        $count2=$count2+1;
      } 
      $countH=$countH+1;
      echo $theString;
	  echo "<center><font color='#999999' size='-3'>$theString2</font></center>";

      $rsReplies1=mysql_fetch_array($rsReplies_query1);

    } 
    if ($flag==0)
    {

      echo "<center><font color='#AA0000'>No Answer</font></center>";
    } 
              


 
?>
         </span>   </td>
            <?php    
			   if ($_SESSION['valid_admin']) { ?> 
               <td  height="20" align="left"  bgcolor="#FFFFCC" class="sidebarlt" align="center">
			   <?php 
		$Find_First_answer="select * from answers where problemid=".$problemid1." AND techemail IN(".$findTechnicians.") ORDER BY answerid  ASC LIMIT 1"; 			
											 	 				 $Find_First_query=mysql_query($Find_First_answer);
								  error();  
							//	  echo $Find_First_answer;
								while ($results_first=mysql_fetch_array($Find_First_query))
								{
						$first_answer_date= $results_first['indate_ans']; 
						$first_answer_time= $results_first['intime_ans']; 
					 
						
}		
			 if( ($first_answer_time!='00:00:00') && ($form_intime1!='00:00:00') && ($first_answer_date!=''))
			 {
							                                     $date_posted=new DateTime($form_indate1."$form_intime1"); //echo "posted:".$form_indate1."$form_intime1";echo "<br>";
																 $date_answered=new DateTime($first_answer_date."$first_answer_time"); //echo "ans:".$first_answer_date."$first_answer_time";echo "<br>";
																 $time_interval = $date_posted->diff($date_answered);
																
															    echo " <img src='images/Bullet-ambar.png' width='10' height='10' alt='Response time' title='Response time' /> <font color='#999999'>";  
															
																          $metritis=0;
   													  if ($time_interval->d!='0') {$metritis= $metritis+1;echo $time_interval->d."d"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}															  												      if ($time_interval->h!='0'){$metritis= $metritis+1;echo $time_interval->h."h"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}
									  			      if ($time_interval->i!='0'){$metritis= $metritis+1;echo $time_interval->i."m"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}
										              if ($time_interval->s!='0') {$metritis= $metritis+1;echo $time_interval->s."s"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}  
																   	echo "</font>";			
																	echo "</br>";																	
																												
																	
						$first_answer_time='';
						$first_answer_date='';
					    $form_indate1='';
						$form_intime1='';										
						 } ?>
			</td><?php 
			   }?>
			
			
			
			
						
			
			
			
			
			
			
			<?php /*?>if ($_SESSION['valid_admin']) { ?> <td  height="20" align="left"  bgcolor="#FFFFCC" class="sidebarlt"><?php 
			
			 if( ($intime_ans!='00:00:00') && ($form_intime1!='00:00:00') && ($indate2!='') && (in_array($reply_email, $array)))
			 {
		

										
                                                                 $date_posted=new DateTime($form_indate1."$form_intime1"); echo "posted:".$form_indate1."$form_intime1";echo "<br>";
																 $date_answered=new DateTime($indate2."$intime_ans");echo "ans:".$indate2."$intime_ans";echo "<br>";
    												             $time_interval = $date_posted->diff($date_answered);
															    echo " <img src='images/Bullet-ambar.png' width='15' height='15' /> ";            
   																  if ($time_interval->d!='0') {echo $time_interval->d."d";	}															 
																    if ($time_interval->h!='0'){echo $time_interval->h."h";}
																    if ($time_interval->i!='0'){echo $time_interval->i."m";}
																    if ($time_interval->s!='0') {echo $time_interval->s."s";}  
																   
			$indate2='';
			$intime_ans='';
			$form_indate1='';
			$form_intime1=''; 
			$reply_email='';
			 }?>
			</td><?php }  ?><?php */?>

          </tr>
	<?php 	        $Urg=mysql_fetch_array($UrgentQuery);
 } 

  $UrgentQuery=mysql_query($UrgentSQL);
  $Urg=mysql_fetch_array($UrgentQuery);

$Urg=null; ?>
                 <tr bgcolor="#FFFFFF">
                <td height="8" colspan="8" align="center" bgcolor="#FFFFFF" ></td>
        </tr></table>
          
     <?php
          } 
?>
         <table width="100%"> 
<tr  >
                <td colspan="3" align="center" class="back"><div align="left"><?php echo _("Sort by")?>:
                    <select name="menu_sort" class="text" id="menu_sort" >
                      <option value="0" <?php if (empty($_GET["menu_sort"])) {echo(" selected");} ?>><?php echo _("No")?></option>
                      <option value="1"<?php if ($_GET["menu_sort"]=="1"){ echo (" selected");}?>><?php echo _("State")?></option>
                      <option value="2"<?php if ($_GET["menu_sort"]=="2"){ echo (" selected");}?>><?php echo _("Topic")?></option>
                      <option value="3"<?php if ($_GET["menu_sort"]=="3"){ echo (" selected");}?>><?php echo _("Originator")?></option>
                      <option value="4"<?php if ($_GET["menu_sort"]=="4"){ echo (" selected");}?>><?php echo _("Date")?></option>
                  </select>
                    <select name="menu_sort2" class="text" id="menu_sort2">
                      <option value="1"<?php if ($_GET["menu_sort2"]){ echo (" selected");}?>><?php echo _("Ascending")?></option>
                      <option value="0" <?php if (empty($_GET["menu_sort2"])){ echo (" selected");}?>><?php echo _("Decending")?></option>
                  </select>
                  <input name="Submit2" type="submit" value="<?php echo _("Go")?>" />
                </div>                </td>
                <td height="20" colspan="2" class="back" align="left"><div align="center">
                <font class="textintence"><?php echo _("Pending Problems");?></font></div></td>
<td height="20" align="center" class="back">
          <select name="menu1" onchange="go(this, 1, false)" valign="bottom" class="text">
                    <option selected="selected"> - <?php echo _("Options");?> - </option>
                    <option><?php echo _("Last 30 Solved problems"); ?> </option>
                    <option><?php echo _("Solved Problems"); ?></option>
                    <option><?php echo _("Explanation of Icons");?></option>
                    <option><?php echo _("Exit"); ?></option>
            </select>               </td>
           </tr>
    </table> 
	
          <table width="100%" border="0">
          <tr class="textintence" >
                <td width="5%" height="100%" class="sidebardk" ><?php echo _("No");?></td>
               <td width="5%" height="100%" align="center" class="sidebardk"><?php echo _("State");?></td>
               <td width="38%"  height="100%" class="sidebardk"><?php echo _("Topic");?> </td>
               <td width="16%"  height="100%" class="sidebardk" ><?php echo _("Originator");?></td>
               <td width="12%"  height="100%" align="center" class="sidebardk"><?php echo _("Date");?></td>
               <td width="26%"  height="100%" class="sidebardk"><?php echo _("Replies From");?></td>
               <?php    if ($_SESSION['valid_admin']) { ?> <td width="26%"  height="100%" colspan="2" class="sidebardk"><?php echo _("Response");?></td><?php } ?>

          </tr>
                  <?php // Now lets grab all the records gia ta unsolved problems
$count=0;
while(!$rstemp==0)
{

$count=$count+1;
  $problemid=$rstemp["problemid"];
  $form_subject=$rstemp["subject"];
  $form_indate=$rstemp["indate"];
  $form_intime=$rstemp["intime"];
  $form_name=$rstemp["name"];
  $urgency=$rstemp["urgency"];
 $private=$rstemp["private"];
 $user=$rstemp["email"];
  $intime=$rstemp["intime"];

  $mySQLreplies="select * from answers ";
  $mySQLreplies=$mySQLreplies."where problemid=".$problemid ;
  $mySQLreplies=$mySQLreplies." ORDER BY answerid DESC"; 


  $mySQLstate="select * from problems ";
  $mySQLstate=$mySQLstate."where problemid=".$problemid;
$mySQLstate=$mySQLstate." ORDER BY answerid DESC";

$rsReplies_query=mysql_query($mySQLreplies);  
error();
$rsReplies=mysql_fetch_array($rsReplies_query);
$rsstate_query=mysql_query($mySQLstate);  
$rsstate=mysql_fetch_array($rsstate_query);

$username= ($_SESSION['valid_user']);


if (($username."@cs.ucy.ac.cy")==$user) 
{$author=1;}
else
{$author=0;}


if (
(($private=="1")&&($author=="1"))||
(($private=="1")&&($_SESSION['valid_tech']))||
($private=="0")
)
{
  

?>



  <tr class="sidebarlt"  >
                    <td height="20" align="center" class="sidebarlt"><?php     echo $problemid; ?></td>
                    <td  height="20" align="center" class="sidebarlt">
	<?php  
    $flag2=0;
    $statement=0;
while(!($rsstate==0))
    {
      if ($flag2==0)
      {
        $statement=$rsstate["solvedstate"];
        $tech=$rsstate["techname"];
        $flag2=1;
      } 
      $rsstate=mysql_fetch_array($rsstate_query);
    } 

 if ($statement=="0")
    {
       echo "<img  src='pictures/closed.gif' alt='pending' title='pending'> ";
	   } 
else
{ echo "<img  src='pictures/yellockfolder.gif' alt='solved' title='solved'>";	   } 	   
	  
 if ($private=="1")
	
    {
       echo "<img  src='pictures/private.gif' alt='private' title='private'>";
    } 

  if ($urgency=="2")
	
    {
       echo "<img  src='pictures/urgent.gif' alt='urgent' title='urgent' >";
    } 

  if ($urgency=="1")
	
    {
       echo "<img  src='pictures/hot.gif' alt='urgent' title='urgent' >";
    } 
?></td>
                    <td height="20" valign="middle" class="sidebarlt" ><div align="left">
                      <?php $my_link=$scriptresponder."?which=".$rstemp[$IDfield]; ?>
                      <a href="<?php echo $my_link; ?>">
                        <?php echo $form_subject; ?>
                      </a><a href="<?php echo $my_link; ?>"></a></div></td>
                    <td  height="20" align="left" class="sidebarlt">
                      <?php echo $form_name; ?>                    </td>
                    <td height="20" valign="middel"  class="sidebarlt">
                      <?php     echo $form_indate; ?><br /> <?php   if ($form_intime!='00:00:00') {						
						    echo "<center><font color='#999999' size='-3'>$form_intime</font></center>"; }?>           </td>
                    <td height="20" class="sidebarlt" align="left">
                      <span style="font-size: 11px">
                      <?php $flag=0;
    $countH=0;
while(!($rsReplies==0))
    {

      $flag=1;
      $reply_name=$rsReplies["name_ans"];
      $reply_email=$rsReplies["techemail"];
      $indate2=$rsReplies["indate_ans"];
	  $inttime=$rsReplies["intime_ans"];
	  $theString=    $reply_name."<br>";
	  
	  
	   if ($inttime!='00:00:00') {						
						 $theString2=   $indate2." (".$inttime.")<br>";    }
						 else
						 {$theString2=   $indate2;}
      $count2=0;
	 /// $dateinsert = new DateTime($sql_date_entry);
     // $datetime2 = new DateTime($current_date);
//$interval = $datetime1->diff($datetime2);
    //  $interval=abs($interval->format('%R%a days'));
	 // echo
	  
while(($countH>$count2))
      {

        $theString=" ".$theString;
        $count2=$count2+1;
      } 
      $countH=$countH+1;
      echo $theString;
echo "<center><font color='#999999' size='-3'>$theString2</font></center>";
      $rsReplies=mysql_fetch_array($rsReplies_query);

    } 
    if ($flag==0)
    {

      echo "<center><font color='#AA0000'>No Answer</font></center>";
    } 

?>
                    </span>                    </td>
                    
                    <?php    if ($_SESSION['valid_admin']) { ?> <td  height="20" align="left"  bgcolor="#FFFFCC" class="sidebarlt" align="center"><?php 
		$Find_First_answer="select * from answers where problemid=".$problemid." AND techemail IN(".$findTechnicians.") ORDER BY answerid  ASC LIMIT 1"; 			
											 	 				 $Find_First_query=mysql_query($Find_First_answer);
								  error();  
								while ($results_first=mysql_fetch_array($Find_First_query))
								{
						$first_answer_date= $results_first['indate_ans']; 
						$first_answer_time= $results_first['intime_ans']; 
					 
						
}
		

			 if( ($first_answer_time!='00:00:00') && ($form_intime!='00:00:00') && ($first_answer_date!='')) 
			 {
							                                     $date_posted=new DateTime($form_indate."$form_intime"); //echo "posted:".$form_indate."$form_intime";echo "<br>";
																 $date_answered=new DateTime($first_answer_date."$first_answer_time");// echo "ans:".$first_answer_date."$first_answer_time";echo "<br>";
																 $time_interval = $date_posted->diff($date_answered);
																
															    echo " <img src='images/Bullet-ambar.png' width='10' height='10' alt='Response time' title='Response time' /> <font color='#999999'>";  
															
																          $metritis=0;
   													  if ($time_interval->d!='0') {$metritis= $metritis+1;echo $time_interval->d."d"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}															  												      if ($time_interval->h!='0'){$metritis= $metritis+1;echo $time_interval->h."h"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}
									  			      if ($time_interval->i!='0'){$metritis= $metritis+1;echo $time_interval->i."m"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}
										              if ($time_interval->s!='0') {$metritis= $metritis+1;echo $time_interval->s."s"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}  
																   	echo "</font>";			
																	echo "</br>";
																																																	 														
																	
						$first_answer_time='';
						$first_answer_date='';
						$last_answer_time='';
						$last_answer_date='';
						$form_indate='';
						$form_intime='';
						$time_interval ='';
																
						 } ?>
			</td><?php 
			} ?>
                                       
               
            
            </tr>
                  <?php }
$rstemp=mysql_fetch_array($rstemp_query);

} 

$rstemp_query=mysql_query(($mySQL));
$rstemp=mysql_fetch_array($rstemp_query);

$rstemp=null;


?>
        </table>
        <table width="100%" border="0"  >
        
     
<tr >
                      <td width="5%" height="21"></td>
                  <td width="6%" height="21" align="center"></td>
            <td width="41%" height="21"></td>
            <td width="11%" height="21"></td>
            <td width="10%" height="21" align="center"></td>
            <td width="27%" height="21"><a name="solvedexpl" id="solvedexpl"></a></td>
          </tr>
      
                    <tr class="sidebardk" > 
 <td colspan="7" bgcolor="#666600" class="sidebardk" ><div align="center" class="textintence">
   <div align="center"><strong class="text_header"><?php echo _("Last 30 solved problems");?></strong><span class="note"><?php echo _("(Sort default by date solved)"); ?></span></div>
 </div></td>
 </tr>
                
                
                
                    <tr >
                      <td height="22"></td>
                      <td height="22" align="center"></td>
                      <td height="22"></td>
                      <td height="22"></td>
                      <td height="22" align="center"></td>
                      <td height="22"></td>
                    </tr>
                     <tr class="textintence" >
                <td width="5%" height="100%" class="sidebardk" ><?php echo _("No");?></td>
               <td width="6%" height="100%" align="center" class="sidebardk"><?php echo _("State");?></td>
               <td width="30%"  height="100%" class="sidebardk"><?php echo _("Topic");?> </td>
               <td width="16%"  height="100%" class="sidebardk" ><?php echo _("Originator");?></td>
               <td width="13%"  height="100%" align="center" class="sidebardk"><?php echo _("Date");?></td>
               <td width="26%"  height="100%" class="sidebardk"><?php echo _("Replies From");?></td>
               <?php    if ($_SESSION['valid_admin']) { ?><td width="27%"  height="100%" class="sidebardk"><?php echo _("Response");?></td><?php } ?>
          </tr>
                    <?php // Now lets grab all the records for last 30 problems solved

$count=0;
while((!$rstemp2==0) && ($count<30))
 
{$count=$count+1;
$IDfield23="problemidd";
$scriptresponder="subjectview4.php";
                  
 $form_subject=$rstemp2["subject"];
  $form_indate=$rstemp2["indate"];
  $form_intime=$rstemp2["intime"];  
  $form_name=$rstemp2["name"];
  $urgency=$rstemp2["urgency"];
  $private=$rstemp2["private"];
  $problemid=$rstemp2["problemid"];
  $user=$rstemp2["email"];
  
  $mySQLreplies="select * from answers ";
  $mySQLreplies=$mySQLreplies."where problemid=".$problemid ;
  $mySQLreplies=$mySQLreplies." ORDER BY answerid DESC"; 

  $mySQLstate2="select * from problems ";
  $mySQLstate2=$mySQLstate2."where problemid=".$problemid;
  $mySQLstate2=$mySQLstate2." ORDER BY answerid DESC";

$rsReplies_query=mysql_query($mySQLreplies);  
error();
$rsReplies=mysql_fetch_array($rsReplies_query);
$rsstate_query2=mysql_query($mySQLstate2);  
$rsstate2=mysql_fetch_array($rsstate_query2);

$username= ($_SESSION['valid_user']);


if (($username."@cs.ucy.ac.cy")==$user) 
{$author=1;}
else
{$author=0;}

if (
(($private=="1")&&($author=="1"))||
(($private=="1")&&($_SESSION['valid_tech']))||
($private=="0")
)
{
  ?>
                    <tr>
                      <td height="20" align="center" class="sidebarlt">
                        <?php echo $problemid; ?> </td>
                      
                      <td  height="20" align="center" class="sidebarlt"><?php $flag2=0;
   
while(!($rsstate2==0))
    {
      if ($flag2==0)
      {
        $statemen=$rsstate2["solvedstate"];
        $tech=$rsstate2["techname"];
        $flag2=1;
      } 
      $rsstate2=mysql_fetch_array($rsstate_query2);
    } 


	   
	 if($statemen=="0") 
	  {
 	  echo "<img  src='pictures/closed.gif' alt='pending' title='pending'>";	   } 
	  
	 else
    {
     	  echo "<img  src='pictures/yellockfolder.gif' alt='solved' title='solved'>";
	  }
	  
	  if ($private=="1")
	
    {
       echo "<img  src='pictures/private.gif' alt='private' title='private' >";
    } 
	
	if ($urgency=="2")
	
    {
       echo "<img  src='pictures/urgent.gif' alt='urgent' title='urgent' >";
    } 
     if ($urgency=="1") 
	  {
	  echo "<img  src='pictures/hot.gif' alt='urgent' title='urgent'>";	   } 
    
?></td>
                      <td height="20" valign="middle"  class="sidebarlt" ><div align="left">
                        <?php $my_link=$scriptresponder."?which=".$rstemp2["problemid"]; ?>
                        <a href="<?php echo $my_link; ?>">
                        <?php echo $form_subject; ?>
                        </a>
                        <div align="left"></div>
                      </div></td>
                      <td  height="20" align="left"  class="sidebarlt">
                        <?php echo $form_name; ?>
                      </td>
                      <td height="20" align="center" valign="middel" bgcolor="#F7F9D9"  class="sidebarlt">
                        <?php     echo $form_indate; ?><br /> <?php   if ($form_intime!='00:00:00') {						
						    echo "<center><font color='#999999' size='-3'>$form_intime</font></center>"; }?>
                      </td>
                      <td height="20"align="left"  class="sidebarlt">
                       <span style="font-size: 11px">
                      <?php     $flag=0;
    $countH=0;
while(!($rsReplies==0))
    {
      $flag=1;
      $reply_name=$rsReplies["name_ans"];
      $reply_email=$rsReplies["techemail"];
	  $indate2=$rsReplies["indate_ans"];
	  $inttime=$rsReplies["intime_ans"];
	  $theString=    $reply_name."<br>";
	  
	   if ($inttime!='00:00:00') {						
						 $theString2=   $indate2." (".$inttime.")<br>";    }
						 else
						 {$theString2=   $indate2;}					 
	    
      $count2=0;
while(($countH>$count2))
      {

        $theString="".$theString;
        $count2=$count2+1;
      } 
      $countH=$countH+1;
      echo $theString;
	  echo "<center><font color='#999999' size='-3'>$theString2</font></center>";

      $rsReplies=mysql_fetch_array($rsReplies_query);
    } 
    if ($flag==0)
    {
      echo "<center><font color='#AA0000'>No Answer</font></center>";
    } 
?></span></td>

<?php    if ($_SESSION['valid_admin']) { ?> <td  height="20" align="left"  bgcolor="#FFFFCC" class="sidebarlt" align="center"><?php 
		$Find_First_answer="select * from answers where problemid=".$problemid." AND techemail IN(".$findTechnicians.") ORDER BY answerid  ASC LIMIT 1"; 			
											 	 				 $Find_First_query=mysql_query($Find_First_answer);
								  error();  
								while ($results_first=mysql_fetch_array($Find_First_query))
								{
						$first_answer_date= $results_first['indate_ans']; 
						$first_answer_time= $results_first['intime_ans']; 
					 
						
}
		
			$Find_Last_answer="select * from answers where problemid=".$problemid." AND techemail IN(".$findTechnicians.") ORDER BY answerid  DESC LIMIT 1"; 			
											 	 				 $Find_Last_query=mysql_query($Find_Last_answer);
								  error();  
								while ($results_last=mysql_fetch_array($Find_Last_query))
								{
							$last_answer_date= $results_last['indate_ans']; 
						$last_answer_time= $results_last['intime_ans']; 
}
			 if( ($first_answer_time!='00:00:00') && ($form_intime!='00:00:00') && ($first_answer_date!='')) //&& (in_array($reply_email, $array)))
			 {
							                                     $date_posted=new DateTime($form_indate."$form_intime"); //echo "posted:".$form_indate."$form_intime";echo "<br>";
																 $date_answered=new DateTime($first_answer_date."$first_answer_time"); //echo "ans:".$first_answer_date."$first_answer_time";echo "<br>";
																 $date_solved=new DateTime($last_answer_date."$last_answer_time"); //echo "solved:".$last_answer_date."$last_answer_time";echo "<br>";
    												             $time_interval = $date_posted->diff($date_answered);
																 $time_solved= $date_posted->diff($date_solved);
															    echo " <img src='images/Bullet-ambar.png' width='10' height='10' alt='Response time' title='Response time' /> <font color='#999999'>";  
															
																          $metritis=0;
   													  if ($time_interval->d!='0') {$metritis= $metritis+1;echo $time_interval->d."d"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}															  												      if ($time_interval->h!='0'){$metritis= $metritis+1;echo $time_interval->h."h"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}
									  			      if ($time_interval->i!='0'){$metritis= $metritis+1;echo $time_interval->i."m"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}
										              if ($time_interval->s!='0') {$metritis= $metritis+1;echo $time_interval->s."s"; if ($metritis==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}  
																   	echo "</font>";			
																	echo "</br>";
																	
																	 //$date_posted=new DateTime($form_indate."$form_intime"); echo "posted:".$form_indate."$form_intime";echo "<br>";
																// $date_answered=new DateTime($first_answer_date."$first_answer_time"); echo "ans:".$first_answer_date."$first_answer_time";echo "<br>";
    												             //$time_interval = $date_posted->diff($date_answered);
															    echo " <img src='images/Bullet-green.png' width='10' height='10' alt='Resolve time' title='Resolve time' /> <font color='#999999'>";  
															
																          $metritis2=0;
   													  if ($time_solved->d!='0') {$metritis2= $metritis2+1;echo $time_solved->d."d"; if ($metritis2==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}															  												      if ($time_solved->h!='0'){$metritis2= $metritis2+1;echo $time_solved->h."h"; if ($metritis2==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}
									  			      if ($time_solved->i!='0'){$metritis2= $metritis2+1;echo $time_solved->i."m"; if ($metritis2==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}
										              if ($time_solved->s!='0') {$metritis2= $metritis2+1;echo $time_solved->s."s"; if ($metritis2==1){echo "</font><br><font color='#999999' size='-3'>";  ;}}  
																   	echo "</font>";																	
																	
						$first_answer_time='';
						$first_answer_date='';
						$last_answer_time='';
						$last_answer_date='';
						$form_indate='';
						$form_intime='';										
						 } ?>
			</td><?php 
			} ?>
                    
                    
                    
                    
                    
                    
                    
                    </tr>
                    <?php }		
$rstemp2=mysql_fetch_array($rstemp_query2);
}
$rstemp_query2=mysql_query(($mySQL2));
$rstemp2=@mysql_fetch_array($rstemp_query2);

$rstemp2=null; 


?>
</table></td>
            </tr>
          </table>
        <?php if ($count==0)
{
?>
      </form>

  <div align="center">
    <p><span class="textintence"><strong><font color="#AA0000"><?php echo _("No problems reported in the above period"); ?></font></strong></span><strong><font color="#AA0000">
      <?php } ?> 
    </font></strong></p>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="navBar" >
      <tr>
        <td width="5%" align="left"  height="21"><a href="solved_pending.php#topi">
        
        <img src="pictures/top.gif" alt="top" width="14" height="10" border="0" title="top" /></a></td>
       
       <td width="91%" align="right"><div align="center" class="note">
        
        <strong><img src="pictures/yellockfolder.gif" alt="solved"  title="solved" width="14"
    height="15" /> : <?php echo _("Solved Problems (Only technicians set problems to that state)"); ?><br />
            
            
            
            <img src="pictures/closed.gif" alt="pending" title="pending" width="14" height="11" />
            :
           
			<?php echo _("Problems that haven't been solved yet or pending problems"); ?><br />
        
            
            <img src="pictures/hot.gif" width="15" height="15"
    alt="urgent" title="urgent" /> :  <?php echo _("Urgent Problems (by user)"); ?> <br />
       
       <img src="pictures/urgent.gif" width="20" height="17"
    alt="urgent" title="urgent" />:<?php echo _("Extra Urgent Problem (by administrator)"); ?><br />
    
       <img src="pictures/private.gif"  width="15" height="15" alt="private" title="private" />:<?php echo _("Private Problems"); ?><br />
      <?php    if ($_SESSION['valid_admin']) { 
	  
	    echo " <img src='images/Bullet-ambar.png' width='10' height='10' alt='Response time' title='Response time' /> "; echo _(":Response time"); 
		echo "<br>";
		echo " <img src='images/Bullet-green.png' width='10' height='10' alt='Resolve time' title='Resolve time'  /> "; echo _(":Resolve time"); 
		
		 }?> 
       
    
    <a name="expl" id="expl"></a></strong></span></div></td>
        <td width="4%" align="right" height="21"><a href="solved_pending.php#topi"><img src="pictures/top.gif" alt="top" title="top" width="14" height="10" border="0" /></a> </td>
      </tr>
    </table>
  
  
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
