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
    <td ><a href="admin.php"  >Assign a problem</a></td>
    <td ><a href="admin/edittech.php"  >Edit Technicians </a></td>
    <td ><a href="admin/postdel.php"  >Remove a request</a></td>
    <td ><a href="admin/reassign_problem.php">Re-assign a problem </a></td>
    <td ><a href="tasks_pending.php"  >View all tasks</a></td>
    <td ><a href="admin/newtask.php"  >Enter new task</a></td>
    <td ><a href="techtesting.php"><?php echo _("View All assigned to Me"); ?></a></td>
     <td ><a href="analytics.php"><?php echo _("Analytics"); ?></a></td>
    </tr>
</table>

	  
	  
	  <!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --></h1>
      
    <!-- InstanceBeginEditable name="EditRegion1" -->




<!-- ------------------------------------------------------------------------------------------------------------------------------->
<?php include ($_SESSION['directory_name'].'/includes/libchart/libchart/classes/libchart.php'); ?>
<form action="analytics.php" method="get">
<table border="1" width="100%" cellspacing="0" cellpadding="0" >

       <tr class="textintence">
            <td>
                          <?php echo _("Choose Technician:"); ?>

               <select name="menu_sort" class="text" id="menu_sort" >
                   <option value="0" <?php if (empty($_GET["menu_sort"])) {echo(" selected");} ?>><?php echo _("Default O.T.Y"); ?></option>
                   <option value="1"<?php if ($_GET["menu_sort"]=="1"){ echo (" selected");}?>><?php echo _("Tsiolakki Maria"); ?></option>
                   <option value="2"<?php if ($_GET["menu_sort"]=="2"){ echo (" selected");}?>><?php echo _("Savvas Nikiforou"); ?></option>
                   <option value="3"<?php if ($_GET["menu_sort"]=="3"){ echo (" selected");}?>><?php echo _("Andreas Kekkou"); ?></option>
                   <option value="4"<?php if ($_GET["menu_sort"]=="4"){ echo (" selected");}?>><?php echo _("Andry Michaelidou"); ?></option>
                   <option value="5"<?php if ($_GET["menu_sort"]=="5"){ echo (" selected");}?>><?php echo _("Andreas Filippou"); ?></option>
                   <option value="6" <?php if ($_GET["menu_sort"]=="6"){ echo (" selected");}?>><?php echo _("Loizos Papadopoulos"); ?></option>
                   <option value="7" <?php if ($_GET["menu_sort"]=="7"){ echo (" selected");}?>><?php echo _("Andreas Kasenides"); ?></option>
               </select>
            </td>

            <td>
               <?php echo _("Choose Period:"); ?>

               <select name="menu2" class="text" id="menu2">
                   <option value="0" <?php if (empty($_GET["menu2"])){ echo (" selected");}?>>- <?php echo _("Default Last Week"); ?> - </option>
                   <option value="1"<?php if ($_GET["menu2"]=="1"){ echo (" selected");}?>>-<?php echo _("Last Month"); ?>-</option>
                   <option value="2"<?php if ($_GET["menu2"]=="2"){ echo (" selected");}?>>-<?php echo _("Last 3 Months"); ?>-</option>
                   <option value="3"<?php if ($_GET["menu2"]=="3"){ echo (" selected");}?>>-<?php echo _("Last 6 Months"); ?>-</option>
                   <option value="4"<?php if ($_GET["menu2"]=="4"){ echo (" selected");}?>>-<?php echo _("Last Year"); ?>-</option>
               </select>
            </td>
            <!--
            <td>
               <select name="menu1" class="text" id="menu1">
                   <option value="0" <?php if (empty($_GET["menu1"])){ echo (" selected");}?>>-<?php echo _("Average response time"); ?>-</option>
                   <option value="1"<?php if ($_GET["menu1"]=="1"){ echo (" selected");}?>>-<?php echo _("Average resolve time"); ?>-</option>
               </select>
            </td>
            -->
            <td>
               <input name="Submit" type="submit" value="<?php echo _("Go"); ?>" />
            </td>
       </tr>
</table>

</form>



 <?php

       //-------------------------------------------------		
       //Variables
       $menu_sort=$_GET['menu_sort'];//technicians
      // $menu1=$_GET['menu1'];//Period
       $menu2=$_GET['menu2'];//response or resolve time
       //-------------------------------------------------

       //Estimate the period----------------------------------------------------------
	   $current_date = date("Y-m-d");
	   
	   if($menu2==0){
		   			 $past_date = strtotime("-1 week", strtotime($current_date));
		//			 $daytime=7;
					//  $past_date=date("Y-m-d", $past_date);				    
	   }
	   elseif($menu2==1){
			   			 $past_date = strtotime("-1 month", strtotime($current_date));
	//					 $daytime=31;
						//    $mySQLx="SELECT * FROM answers";
	   }
	   elseif($menu2==2){
		   				 $past_date = strtotime("-3 months", strtotime($current_date));
//	                    $daytime=90;
						  //  $mySQLx="SELECT * FROM answers";
	   }
	   elseif($menu2==3){
		   				 $past_date = strtotime("-6 months", strtotime($current_date));
	                      //$daytime=182;
						    //$mySQLx="SELECT * FROM answers";
	   }
	   elseif($menu2==4){
		                 $past_date = strtotime("-1 year", strtotime($current_date));
	                     //$daytime=365;
						    //$mySQLx="SELECT * FROM answers";
	   }
	   // Format and display the computed date----------------------------------------

       $past_date=date("Y-m-d", $past_date);
   $mySQLx="SELECT techemail, indate_ans, intime_ans FROM answers WHERE indate_ans BETWEEN '".$past_date."' AND curdate()";
   $mySQL2x="SELECT * FROM answers, problems WHERE problems.problemid = answers.problemid AND problems.solvedstate = answers.answerid AND answers.indate_ans BETWEEN '".$past_date."' AND curdate()"; 
	   //.$current_date;
	//   echo $mySQLx;
       //-----------------------------------------------------------------------------

       //(a)Who answer questions----------------------------------------------------------------------------------------------------------------
	   //Variables for 'who'
       $counter0=0; //O.T.Y
       $counter1=0; //tmaria
       $counter2=0; //savvasn
       $counter3=0; //kekkou
       $counter4=0; //andrim
       $counter5=0; //andreasf
       $counter6=0; //louispap
       $counter7=0; //ank
	   
	   $counter10=0; //O.T.Y
       $counter11=0; //tmaria
       $counter12=0; //savvasn
       $counter13=0; //kekkou
       $counter14=0; //andrim
       $counter15=0; //andreasf
       $counter16=0; //louispap
       $counter17=0; //ank
      // $mySQLx="SELECT * FROM answers";
       $rstempx_query=mysql_query($mySQLx);
	   error();
	   $rstempx=mysql_fetch_array($rstempx_query);
	 
       $rstemp2x_query=mysql_query($mySQL2x);
	   error();
	   $rstemp2x=mysql_fetch_array($rstemp2x_query);

	 
	   while(!($rstempx==0)){
                  
			 $who=trim($rstempx["techemail"]);
			 $who=strstr($who,'@',true);
			// echo $rstempx["indate_ans"];
			// echo $rstempx["techemail"];
			// echo $rstempx["problemid"];
//echo ("<br>");
	
			 	
				if($menu_sort==7)
				{
					if(strcmp($who,'ank')==0) $counter7++;
				}
					elseif($menu_sort==1)
					{
					      if(strcmp($who,'tmaria')==0){
										$counter1++;
									 }
					}
			 		elseif($menu_sort==2){
					                 if(strcmp($who,'savvasn')==0){
									    $counter2++;
									 }
					}
			 		elseif($menu_sort==3){
					                 if(strcmp($who,'kekkos')==0){
								        $counter3++;
									 }
					}
			 		elseif($menu_sort==4){
					                 if(strcmp($who,'andrim')==0){
										$counter4++;
									 }
					}
			 		elseif($menu_sort==5){
					                 if(strcmp($who,'andreasf')==0){
										$counter5++;
									 }
					}
					elseif($menu_sort==6){
					                 if(strcmp($who,'louispap')==0){
										$counter6++;
									 }
					}
					elseif($menu_sort==0){
						                   if(strcmp($who,'tmaria')==0)$counter1++;
										   if(strcmp($who,'savvasn')==0)$counter2++;
										   if(strcmp($who,'kekkos')==0) $counter3++;
										   if(strcmp($who,'andrim')==0)	$counter4++;
										   if(strcmp($who,'andreasf')==0)$counter5++;
										   if(strcmp($who,'louispap')==0)$counter6++;
										   if(strcmp($who,'ank')==0)$counter7++;
					}
					//--------------------------------------------------------------------------------------------------------------
			// }
		     $rstempx=mysql_fetch_array($rstempx_query);
	   }
	   $counter0=$counter7+$counter1+$counter2+$counter3+$counter4+$counter5+$counter6;
	   
	   //count poroblems solved
	   
	     while(!($rstemp2x==0)){
                  
			 $who=trim($rstemp2x["techemail"]);
			 $who=strstr($who,'@',true);
			// echo $rstemp2x["indate_ans"];
			// echo $rstemp2x["techemail"];
			// echo $rstemp2x["problemid"];
			// echo ("<br>");
	
			 	
				if($menu_sort==7)
				{
					if(strcmp($who,'ank')==0) $counter17++;
				}
					elseif($menu_sort==1)
					{
					      if(strcmp($who,'tmaria')==0){
										$counter11++;
									 }
					}
			 		elseif($menu_sort==2){
					                 if(strcmp($who,'savvasn')==0){
									    $counter12++;
									 }
					}
			 		elseif($menu_sort==3){
					                 if(strcmp($who,'kekkos')==0){
								        $counter13++;
									 }
					}
			 		elseif($menu_sort==4){
					                 if(strcmp($who,'andrim')==0){
										$counter14++;
									 }
					}
			 		elseif($menu_sort==5){
					                 if(strcmp($who,'andreasf')==0){
										$counter15++;
									 }
					}
					elseif($menu_sort==6){
					                 if(strcmp($who,'louispap')==0){
										$counter16++;
									 }
					}
					elseif($menu_sort==0){
						                   if(strcmp($who,'tmaria')==0)$counter11++;
										   if(strcmp($who,'savvasn')==0)$counter12++;
										   if(strcmp($who,'kekkos')==0) $counter13++;
										   if(strcmp($who,'andrim')==0)	$counter14++;
										   if(strcmp($who,'andreasf')==0)$counter15++;
										   if(strcmp($who,'louispap')==0)$counter16++;
										   if(strcmp($who,'ank')==0)$counter17++;
					}
					//--------------------------------------------------------------------------------------------------------------
			// }
		     $rstemp2x=mysql_fetch_array($rstemp2x_query);
	   }
	   $counter10=$counter17+$counter11+$counter12+$counter13+$counter14+$counter15+$counter16;
	   
	   
	   //---------------------------------------------------------------------------------------------------------------------------
	   //Results--------------------------------------------------------------------------------------------------------------------
		?> 
        
      <br> <h1><b><i><center>Answering Questions in period: <?php echo "<br>"; echo "From: ".$past_date." until: ".$current_date?></center></i></b></h1>
 <table width="100%" height="12%" border="0" >
       <tr class="textintence" >
           <td width="20%" height="100%" class="sidebardk" align="left"><?php echo _("Name");?></td>
           <td width="40%" height="100%" class="sidebardk" align="center"><?php echo _("# Answered Requests");?></td>
           <td width="40%" height="100%" class="sidebardk" align="center"><?php echo _("# Solved Requests");?></td>
       </tr>

		 <?php if(($menu_sort==0)||($menu_sort==7)){ ?>
        
		    <tr valign="middle" bgcolor="#F7F9D9">
		       <td width="24%" height="100%" class="sidebarlt"> <?php echo "Andreas Kasenidis" ?> </td>
               <td width="26%" height="100%" class="sidebarlt"> <?php echo $counter7 ?></td>
               <td width="50%" height="100%" class="sidebarlt"> <?php echo $counter17 ?></td>
            </tr>
   
		<?php  }
		 if(($menu_sort==1)||($menu_sort==0)){ ?>
		
		    <tr valign="middle" bgcolor="#F7F9D9">
		       <td width="24%" height="100%" class="sidebarlt"> <?php echo "Maria Tsiolakki" ?> </td>
               <td width="26%" height="100%" class="sidebarlt"> <?php echo $counter1 ?></td>
               <td width="50%" height="100%" class="sidebarlt"> <?php echo $counter11 ?></td>
            </tr>

		 <?php }
		 if(($menu_sort==2)||($menu_sort==0)){ ?>
       
		    <tr valign="middle" bgcolor="#F7F9D9">
		       <td width="24%" height="100%" class="sidebarlt"> <?php echo "Nikiforou Savvas" ?> </td>
               <td width="26%" height="100%" class="sidebarlt"> <?php echo $counter2 ?></td>
               <td width="50%" height="100%" class="sidebarlt"> <?php echo $counter12 ?></td>
            </tr>
  
		 <?php }
		 if(($menu_sort==3)||($menu_sort==0)){ ?>
        
		    <tr valign="middle" bgcolor="#F7F9D9">
		       <td width="24%" height="100%" class="sidebarlt"> <?php echo "Andreas Kekkou" ?> </td>
               <td width="26%" height="100%" class="sidebarlt"> <?php echo $counter3 ?></td>
               <td width="50%" height="100%" class="sidebarlt"> <?php echo $counter13 ?></td>
            </tr>
     
         <?php }
		 if(($menu_sort==4)||($menu_sort==0)){ ?>
	
		    <tr valign="middle" bgcolor="#F7F9D9">
		       <td width="24%" height="100%" class="sidebarlt"> <?php echo "Andry Michaelidou" ?> </td>
               <td width="26%" height="100%" class="sidebarlt"> <?php echo $counter4 ?></td>
               <td width="50%" height="100%" class="sidebarlt"> <?php echo $counter14 ?></td>
            </tr>
    
		 <?php }
		 if(($menu_sort==5)||($menu_sort==0)){ ?>
        
		    <tr valign="middle" bgcolor="#F7F9D9">
		       <td width="24%" height="100%" class="sidebarlt"> <?php echo "Andreas Filippou" ?> </td>
               <td width="26%" height="100%" class="sidebarlt"> <?php echo $counter5 ?></td>
               <td width="50%" height="100%" class="sidebarlt"> <?php echo $counter15 ?></td>
            </tr>
   
		 <?php }
		 if(($menu_sort==6)||($menu_sort==0)){ ?>
        
		    <tr valign="middle" bgcolor="#F7F9D9">
		       <td width="24%" height="100%" class="sidebarlt"> <?php echo "Loizos Papadopoulos" ?> </td>
               <td width="26%" height="100%" class="sidebarlt"> <?php echo $counter6 ?></td>
               <td width="50%" height="100%" class="sidebarlt"> <?php echo $counter16 ?></td>
            </tr>
 
         <?php }
		 if($menu_sort==0){?>
		 
		    <tr valign="middle" bgcolor="#F7F9D9" >
		       <td width="24%" height="100%" class="sidebarlt" style="font-weight:700" > <?php echo "O.T.Y" ?> </td>
               <td width="26%" height="100%" class="sidebarlt" style="font-weight:700"> <?php echo $counter0 ?></td>
               <td width="50%" height="100%" class="sidebarlt" style="font-weight:700"> <?php echo $counter10 ?></td>
            </tr>
       
		 <?php }?>
		         </table>
                
                
  <?php


//======================================================================================================================================
//Calculate and print average response time
//andrim
//08-07-2013
  
  
for($z = 0;$z<5;$z++){  
if ($z==0){	 $past = strtotime("-1 week", strtotime($current_date)); }
if ($z==1){	 $past = strtotime("-1 month", strtotime($current_date)); }
if ($z==2){	 $past = strtotime("-3 months", strtotime($current_date)); }
if ($z==3){	 $past = strtotime("-6 months", strtotime($current_date)); }
if ($z==4){	 $past = strtotime("-1 year", strtotime($current_date)); }



$past=date("Y-m-d", $past);
//$sql = "SELECT * FROM answers, problems, technicians WHERE problems.problemid = answers.problemid AND technicians.techemail = answers.techemail AND answers.indate_ans BETWEEN '".$past_date."' AND curdate() ORDER BY answers.answerid ASC";
$sql = "SELECT * FROM answers, problems, technicians WHERE problems.problemid = answers.problemid AND technicians.techemail = answers.techemail AND answers.indate_ans BETWEEN '".$past."' AND curdate() ORDER BY answers.answerid ASC";

//echo $sql;
$query=mysql_query($sql);
error();
$results=mysql_fetch_array($query);
$count=0;
$seconds=0;
while(!($results==0)){//for any request in problems table
               	 
$problemid=$results["problemid"];

$sql_ans = "SELECT min(answerid) FROM answers, technicians WHERE problemid='".$problemid."' AND technicians.techemail = answers.techemail ORDER BY answers.answerid ASC";
$query_ans=mysql_query($sql_ans);
error();
$results_ans=mysql_fetch_array($query_ans);
$min=$results_ans[0];
$answerid=$results["answerid"];
//echo $answerid."=?".$min; echo "<br>";
if  ($answerid==$min)//{echo "YES";} else {echo "NO";}
{
//echo "YES";  
//echo "<br>";
if (in_array($problemid, $list)) {} 
else {
$list[$count] = $results["problemid"];   $count++; 
//echo  $count; echo " "; echo $results["problemid"]; echo "<br>";
//echo $results["problemid"]; echo "<br>";
$date_posted=new DateTime($results["indate"].$results["intime"]); 
//echo "posted:".$results["indate"].$results["intime"]; echo "<br>";
$date_answered=new DateTime($results["indate_ans"].$results["intime_ans"]); 
//echo "ans:".$results["indate_ans"].$results["intime_ans"]; echo "<br>";
$time_interval=$date_posted->diff($date_answered);
//echo $time_interval->s;  echo "<br>";
$seconds += ($time_interval->s)
         + ($time_interval->i * 60)
         + ($time_interval->h * 60 * 60)
         + ($time_interval->d * 60 * 60 * 24)
         + ($time_interval->m * 60 * 60 * 24 * 30)
         + ($time_interval->y * 60 * 60 * 24 * 365);
//echo $seconds;

	      }}
			$results=mysql_fetch_array($query);	 


//$results_ans=mysql_fetch_array($query_ans);
}

$average[$z] = $seconds/count($list);
//echo $z." IS ". $average[$z]; 
//echo "<br>";
$seconds=$seconds/count($list);
//echo $seconds;
 if(is_numeric($seconds)){
$value[$z] = array(
  "years" => 0, "days" => 0, "hours" => 0,
  "minutes" => 0, "seconds" => 0,
);
if($seconds >= 31556926){
  $value[$z]["years"] = floor($seconds/31556926);
  $seconds = ($seconds%31556926);
}
if($seconds >= 86400){
  $value[$z]["days"] = floor($seconds/86400);
  $seconds = ($seconds%86400);
}
if($seconds >= 3600){
  $value[$z]["hours"] = floor($seconds/3600);
  $seconds = ($seconds%3600);
}
if($seconds >= 60){
  $value[$z]["minutes"] = floor($seconds/60);
  $seconds = ($seconds%60);
}
$value[$z]["seconds"] = floor($seconds);

}
}
//END
//======================================================================================================================================
			


//======================================================================================================================================
//Calculate and print average resolution time
//andrim
//08-07-2013
		
			
	  
//  echo $current_date;
for($y=0;$y<5;$y++){  
if ($y==0){	 $past = strtotime("-1 week", strtotime($current_date)); }
if ($y==1){	 $past = strtotime("-1 month", strtotime($current_date)); }
if ($y==2){	 $past = strtotime("-3 months", strtotime($current_date)); }
if ($y==3){	 $past = strtotime("-6 months", strtotime($current_date)); }
if ($y==4){	 $past = strtotime("-1 year", strtotime($current_date)); }

$past=date("Y-m-d", $past);				
			
$sql2 = "SELECT * FROM answers, problems  WHERE problems.problemid = answers.problemid AND problems.solvedstate = answers.answerid AND answers.indate_ans BETWEEN '".$past."' AND curdate()";
//echo $sql2;
$query2=mysql_query($sql2);
error();
$results2=mysql_fetch_array($query2);
$count2=0;
$seconds2=0;
while(!($results2==0)){//for any request in problems table
               	 
$problemid=$results2["problemid"];
  

if (in_array($problemid, $list2)) {} 
else {
$list2[$count2] = $results2["problemid"];   $count2++; 
//echo  $count2; echo " "; echo $results2["problemid"]; echo "<br>";
$date_posted=new DateTime($results2["indate"].$results2["intime"]); 
$date_solved=new DateTime($results2["indate_ans"].$results2["intime_ans"]); 
$time_interval2=$date_posted->diff($date_solved);
  

$seconds2 += ($time_interval2->s)
         + ($time_interval2->i * 60)
         + ($time_interval2->h * 60 * 60)
         + ($time_interval2->d * 60 * 60 * 24)
         + ($time_interval2->m * 60 * 60 * 24 * 30)
         + ($time_interval2->y * 60 * 60 * 24 * 365);



	      }
			$results2=mysql_fetch_array($query2);	 
}

$average2[$y] = $seconds2/count($list2);
$seconds2=$seconds2/count($list2);
 if(is_numeric($seconds2)){
$value2[$y] = array(
  "years" => 0, "days" => 0, "hours" => 0,
  "minutes" => 0, "seconds" => 0,
);
if($seconds2 >= 31556926){
  $value2[$y]["years"] = floor($seconds2/31556926);
  $seconds2 = ($seconds2%31556926);
 }
if($seconds2 >= 86400){
  $value2[$y]["days"] = floor($seconds2/86400);
  $seconds2 = ($seconds2%86400);
}
if($seconds2 >= 3600){
  $value2[$y]["hours"] = floor($seconds2/3600);
  $seconds2 = ($seconds2%3600);
}
if($seconds2 >= 60){
  $value2[$y]["minutes"] = floor($seconds2/60);
  $seconds2 = ($seconds2%60);
}
$value2[$y]["seconds"] = floor($seconds2);

}
}
//END
//======================================================================================================================================


//======================================================================================================================================
//Create and show chart 
//andrim
//08-07-2013
echo "<br>";
$chart = new LineChart(500, 250);

	$serie1 = new XYDataSet();	

  	$serie1->addPoint(new Point("Last Year", $average[4]/86400));
	$serie1->addPoint(new Point("Last 6 months", $average[3]/86400));
	$serie1->addPoint(new Point("Last 3 months", $average[2]/86400));
	$serie1->addPoint(new Point("Current month", $average[1]/86400));
	$serie1->addPoint(new Point("Current week", $average[0]/86400));

    $serie2 = new XYDataSet();
	$serie2->addPoint(new Point("Last Year", $average2[4]/86400));
	$serie2->addPoint(new Point("Last 6 months", $average2[3]/86400));
	$serie2->addPoint(new Point("Last 3 months", $average2[2]/86400));
	$serie2->addPoint(new Point("Current month", $average2[1]/86400));
	$serie2->addPoint(new Point("Current week", $average2[0]/86400));
        
    $dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("Average response time", $serie1);
	$dataSet->addSerie("Average resolution time", $serie2);

	$chart->setDataSet($dataSet);   
  
    $chart->setTitle("Averages analytics (in days)");
	$chart->render(($_SESSION['directory_name'].'/includes/libchart/images/averages_'.$current_date.'.png'));
//	$chart->render('/tmp/555.png');
       ?>
<br> <h1><b><i><center>Averages (response and resolve time)</center></i></b></h1>
<center>
  <img  alt="Line chart" src="../includes/libchart/images/averages_<?php echo $current_date;?>.png" style="border: 1px solid gray;" align="middle"/>
</center>
<br />
<?php
//END
//======================================================================================================================================

//======================================================================================================================================
//Create table with averages
//andrim
//08-07-2013
?>

 <table width="100%" height="12%" border="0" >
       <tr class="textintence" >
           <td width="20%" height="100%" class="sidebardk" align="left"><?php echo _("Time");?></td>
           <td width="40%" height="100%" class="sidebardk" align="center"><?php echo _("Average RESPONSE Time");?></td>
           <td width="40%" height="100%" class="sidebardk" align="center"><?php echo _("Average RESOLUTION Time");?></td>
       </tr>
       <tr>
       <td height="100%" class="sidebarlt" align="left" ><strong><?php echo _("Last year");?></strong></td>
      <td height="100%" class="sidebarlt" align="left">
       <img src='../images/Bullet-ambar.png' width='15' height='15' /> 
       
<?php 
$metritis=0;
if($value[4]["years"]!=0){$metritis=$metritis+1; echo $value[4]["years"]." Years, "; if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[4]["days"]!=0) {$metritis=$metritis+1;echo $value[4]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[4]["hours"]!=0){$metritis=$metritis+1;echo $value[4]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[4]["minutes"]!=0){$metritis=$metritis+1;echo $value[4]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[4]["seconds"]!=0){$metritis=$metritis+1;echo $value[4]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
       </td>
      
      <td height="100%" class="sidebarlt" align="left" >
	  <img src='../images/Bullet-green.png' width='15' height='15' /> 
	  <?php 
	  $metritis=0;
if($value2[4]["years"]!=0){$metritis=$metritis+1;echo $value2[4]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[4]["days"]!=0) {$metritis=$metritis+1;echo $value2[4]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[4]["hours"]!=0) {$metritis=$metritis+1;echo $value2[4]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[4]["minutes"]!=0) {$metritis=$metritis+1;echo $value2[4]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[4]["seconds"]!=0) {$metritis=$metritis+1;echo $value2[4]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
</td>

       
       </tr>
       
        <tr>
       <td height="100%" class="sidebarlt" align="left" ><strong><?php echo _("Last 6 months");?></strong></td>
      <td height="100%" class="sidebarlt" align="left"><img src='../images/Bullet-ambar.png' width='15' height='15' /> 
<?php 
  $metritis=0;
if($value[3]["years"]!=0){$metritis=$metritis+1;echo $value[3]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[3]["days"]!=0){$metritis=$metritis+1;echo $value[3]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[3]["hours"]!=0){$metritis=$metritis+1;echo $value[3]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[3]["minutes"]!=0){$metritis=$metritis+1;echo $value[3]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[3]["seconds"]!=0){$metritis=$metritis+1;echo $value[3]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
       </td>
      
      <td height="100%" class="sidebarlt" align="left" ><img src='../images/Bullet-green.png' width='15' height='15' /> 
	  <?php 
	    $metritis=0;
if($value2[3]["years"]!=0){$metritis=$metritis+1;echo $value2[3]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[3]["days"]!=0){$metritis=$metritis+1;echo $value2[3]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[3]["hours"]!=0){$metritis=$metritis+1;echo $value2[3]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[3]["minutes"]!=0){$metritis=$metritis+1;echo $value2[3]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[3]["seconds"]!=0){$metritis=$metritis+1;echo $value2[3]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
</td>

       
       </tr>
       
        <tr>
       <td height="100%" class="sidebarlt" align="left" ><strong><?php echo _("Last 3 months");?></strong></td>
      <td height="100%" class="sidebarlt" align="left"><img src='../images/Bullet-ambar.png' width='15' height='15' /> 
<?php 
  $metritis=0;
if($value[2]["years"]!=0){$metritis=$metritis+1;echo $value[2]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[2]["days"]!=0){$metritis=$metritis+1;echo $value[2]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[2]["hours"]!=0){$metritis=$metritis+1;echo $value[2]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[2]["minutes"]!=0){$metritis=$metritis+1;echo $value[2]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[2]["seconds"]!=0){$metritis=$metritis+1;echo $value[2]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
       </td>
      
       <td height="100%" class="sidebarlt" align="left" ><img src='../images/Bullet-green.png' width='15' height='15' /> 
	   <?php 
	     $metritis=0;
if($value2[2]["years"]!=0){$metritis=$metritis+1;echo $value2[2]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[2]["days"]!=0){$metritis=$metritis+1;echo $value2[2]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[2]["hours"]!=0){$metritis=$metritis+1;echo $value2[2]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[2]["minutes"]!=0){$metritis=$metritis+1;echo $value2[2]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[2]["seconds"]!=0){$metritis=$metritis+1;echo $value2[2]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
</td>

       
       </tr>
        <tr>
       <td height="100%" class="sidebarlt" align="left" ><strong><?php echo _("Current month");?></strong></td>
      <td height="100%" class="sidebarlt" align="left"><img src='../images/Bullet-ambar.png' width='15' height='15' /> 
<?php 
  $metritis=0;
if($value[1]["years"]!=0){$metritis=$metritis+1;echo $value[1]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[1]["days"]!=0){$metritis=$metritis+1;echo $value[1]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[1]["hours"]!=0){$metritis=$metritis+1;echo $value[1]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[1]["minutes"]!=0){$metritis=$metritis+1;echo $value[1]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[1]["seconds"]!=0){$metritis=$metritis+1;echo $value[1]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
       </td>
       
       
        <td height="100%" class="sidebarlt" align="left"><img src='../images/Bullet-green.png' width='15' height='15' /> 
<?php 
  $metritis=0;
if($value2[1]["years"]!=0){$metritis=$metritis+1;echo $value2[1]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[1]["days"]!=0){$metritis=$metritis+1;echo $value2[1]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[1]["hours"]!=0){$metritis=$metritis+1;echo $value2[1]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[1]["minutes"]!=0){$metritis=$metritis+1;echo $value2[1]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[1]["seconds"]!=0){$metritis=$metritis+1;echo $value2[1]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
       </td>
        </tr>
       
       
       
        <tr>
       <td height="100%" class="sidebarlt" align="left" ><strong><?php echo _("Current week");?></strong></td>
      <td height="100%" class="sidebarlt" align="left"><img src='../images/Bullet-ambar.png' width='15' height='15' /> 
<?php 
$metritis=0;
if($value[0]["years"]!=0){$metritis=$metritis+1;echo $value[0]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[0]["days"]!=0){$metritis=$metritis+1;echo $value[0]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[0]["hours"]!=0){$metritis=$metritis+1;echo $value[0]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[0]["minutes"]!=0){$metritis=$metritis+1;echo $value[0]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value[0]["seconds"]!=0){$metritis=$metritis+1;echo $value[0]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
       </td>
       
       
    <td height="100%" class="sidebarlt" align="left" ><img src='../images/Bullet-green.png' width='15' height='15' /> <?php 
	$metritis=0;
	if($value2[0]["years"]!=0){$metritis=$metritis+1;echo $value2[0]["years"]." Years, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[0]["days"]!=0){$metritis=$metritis+1;echo $value2[0]["days"]." Days, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[0]["hours"]!=0){$metritis=$metritis+1;echo $value2[0]["hours"]." Hours, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[0]["minutes"]!=0){$metritis=$metritis+1;echo $value2[0]["minutes"]." Minutes, ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
if($value2[0]["seconds"]!=0){$metritis=$metritis+1;echo $value2[0]["seconds"]." Seconds ";if ($metritis==1){echo "<br><font  size='-3'>"; }}
echo "</font>";
?>      
</td>
        </tr>
      
      

       
    
       
        

     </table>         
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
<!-- InstanceEnd --></html><?php }?>
