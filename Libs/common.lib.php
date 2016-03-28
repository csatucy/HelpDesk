<?php ################################################################################
#	common.lib								#
#										#
#	A common functions library. Just written to be used about anywhere.	#
#	In order for this to function propely you MUST include an application   #
#	specific config file before including 					#
#	this library. See the config.inc file for details.			# 
#						 	 			#
################################################################################# 
#                                  CHANGE LOG                                	#
################################################################################ 
#	15-02-00	ank	0.0.0	Created from scratch			#
#	21-02-00	ank	0.1.0	UserCheck, Dropdown_value 		#
#	14-03-00	ank 	0.1.1	revised error() to output 		#
#					verbose errors				#
#	17-03-00	ank	0.2.0	BackColor() function			#
#	09-04-00	ank	0.3.0	Dropdown_value_withtext			#
#	14-04-00	ank	0.4.0	Dropdown()				#
#	10-05-00	ank	0.5.0	Write_Log()				#
#	16-11-00	ank	0.6.0	Dropdown_value_withbanner		#
#					getsystemid()
#	1-12-00		ank	0.7.0	boardmessage()
#	8-2-07		nsc	0.7.0	db_name set correclty                   #
#										#
################################################################################

(strncmp($_SERVER["HTTP_HOST"],"testing", 7)== 0) ? $db_name = "localhost:3306" : $db_name = "dbserver:3306";


function error()
{
$errno = mysql_errno();
	if ($errno != 0) {
	echo "<BR><B>An SQL error occured.<BR>";
	echo "<BR>MySQL error ".$errno.": ".mysql_error()."<BR>";
	return($errno);
	}
}

function message($msg) 
{
  print "<TABLE border=1 width=100% noshade>";
  print "<TR bgcolor=#0000FF><TD align=center>";
  print "<font color=white>$msg</font></TD></TR></TABLE>";   
  print "<hr noshade>"; 
}

function boardmessage($msg) 
{

print "<a href=\"\" target=\"Board\">$msg</A>";

/*
  print "<TABLE border=1 width=100% target=Board noshade>";
  print "<TR bgcolor=#FFFFFF><TD align=center>";
  print "<font color=white>$msg</font></TD></TR></TABLE>";   
  print "<hr noshade>"; 
*/
}

function connectDB() 
{
  global $db_name, $db_user, $db_passwd, $db_db;
  mysql_connect($db_name, $db_user, $db_passwd);
  mysql_select_db($db_db);
mysql_query("SET NAMES utf8");
} 

function UserCheck($authtype) 
{
  global $SI2Username, $SI2Pass, $DEBUG, $PREFIX;
  connectDB();

  $query = "SELECT * from users where (Username = '$SI2Username')";
  $result = mysql_query($query);
	if ($DEBUG==1) { error(); }
  $password = mysql_result($result, 0, "password");
	if ($DEBUG==1) { error(); }

  if (IsSet($SI2Username) == FALSE) 
  {
    header("Vary: User-Agent");
/*    commonHeader("Not Logged In"); */
    echo "You were not logged in. (Check your browsers cookies)";
    echo "<a href=\"index.php\" target=_top>Go Back to the login screen</a>.";
/*	    commonFooter(); */
	    mysql_close();
	    exit();
  } else if ($SI2Pass != md5($password)) 
  {
	
/*    commonHeader("Bad Password"); */
    PRINT "You have supplied a password that is no longer valid.  This is
	probably because you have just changed it and need to log in
	again. <a href=\"index.php\" target=_top>Go back to the login
	screen</a>."; 
/*    commonFooter(); */
    mysql_close();
    exit();
  } else 
  {
    SetCookie("SI2Username", "$SI2Username", 0, "/");
    SetCookie("SI2Pass", md5($password), 0, "/");
    header("Vary: User-Agent");

	if ($authtype == "normal") {
		$query = "SELECT * FROM users WHERE (Username ='$SI2Username')";
 		$result = mysql_query($query);
		$type = mysql_result($result, 0, "type");
		if ($type != "normal" && $type != "admin" && $type !="adminadmin") 		
		{ 
			PRINT "Permission Denied"; 
 			PRINT "You are not a normal user!";
/*			commonFooter(); */
			exit();
		}
	}
	else if ($authtype == "admin") {
		$query = "SELECT * FROM users WHERE (Username ='$SI2Username')";
 		$result = mysql_query($query);
 		$typee= mysql_result($result, 0, "type");
 		if ($typee != "admin" || $typee !="adminadmin")
		{
/*			  commonHeader("Permission Denied"); */
			  PRINT "Permission Denied<BR>"; 
			  PRINT "You are not an administrator!";
/*			  commonFooter(); */
			  exit();
		}
  	}
	else if ($authtype == "adminadmin") {
		$query = "SELECT * FROM users WHERE (Username ='$SI2Username')";
 		$result = mysql_query($query);
 		$typef= mysql_result($result, 0, "type");
 		if ($typef != "adminadmin")
		{
/*			  commonHeader("Permission Denied"); */
			  PRINT "Permission Denied<BR>"; 
			  PRINT "You are not a super administrator!";
/*			  commonFooter(); */
			  exit();
		}
  	}
	
  }
}

/* Original Author: Christiano Anderson */ 
/* E-mail: anderss@zaz.com.br */ 
/* WebSite: http://www.anderson.eti.br */ 
/* Changed to accept colors from the 
	application configuration by ANK 17-03-00 */

function BackColor($color)     
{
global $BackColorValue1, $BackColorValue2; 

 if($color == $BackColorValue1)         
 {     
    $BackColorValue = $BackColorValue2; 
 } 
 else         
 { 
    $BackColorValue = $BackColorValue1;         
 } 
    return $BackColorValue;     
} 


function Dropdown($table,$orderby,$myname) 
{

  $query = "SELECT * FROM $table ORDER BY \"$orderby\"";
  $result = mysql_query($query);
  if ($DEBUG) error();

  $i = 0;
  $number = MYSQL_NUMROWS($result); 
  if ($number > 0)
    PRINT "<SELECT NAME=\"$myname\" SIZE=1>";
  {
    while ($i < $number)
    {
	$output = mysql_result($result, $i, $orderby);
	PRINT "<OPTION VALUE=\"$output\">$output</OPTION>";
	$i++;
    }
  }
  
  PRINT "</SELECT>";  
}

######################################################
# Selects values from a table.column combination
# and creates a SELECT giving priority to a certain
# value on the select and ordering the select.
######################################################
function Dropdown_value($table, $myname, $value, $order) 
{
  $query = "SELECT * FROM $table ORDER BY \"$order\" ";
  $result = mysql_query($query);

  PRINT "<SELECT NAME=\"$myname\" SIZE=1>";
  $i = 0;
  $number = MYSQL_NUMROWS($result); 
  if ($number > 0)
  {
    if ($value == "")
    {
    PRINT "<OPTION VALUE=\"$output\"></OPTION>";	
    }
    
       while ($i < $number)
    	{
        $output = mysql_result($result, $i, $order);
      	if ($output == $value)
      	{
        	PRINT "<OPTION VALUE=\"$output\" selected>$output</OPTION>";
      	} else
      	{
        	PRINT "<OPTION VALUE=\"$output\">$output</OPTION>";
      	}
      	$i++;
       }
     
  }
  ?>
  </SELECT>
  <?php }

function Dropdown_value_withtext($table,$myname, $value, $order, $text) 
{
  $query = "SELECT * FROM $table ORDER BY \"$order\" ";
  $result = mysql_query($query);

  PRINT "<SELECT NAME=\"$myname\" SIZE=1>";
  $i = 0;
  $number = MYSQL_NUMROWS($result); 
  if ($number > 0)
  {
    while ($i < $number)
    {
      $output = mysql_result($result, $i, $order);
      $outtext = mysql_result($result, $i, $text);
/* echo $text;
echo $outtext;
*/

      if ($output == $value)
      {
        PRINT "<OPTION VALUE=\"$output\" selected>$output - $outtext</OPTION>";
      } else
      {
        PRINT "<OPTION VALUE=\"$output\">$output - $outtext</OPTION>";
      }
      $i++;
    }
  }
  ?>
  </SELECT>
  <?php }

######################################################
# Selects values from a table.column combination
# and creates a SELECT,ordering the select and inserting
# a banner text as the first OPTION.
######################################################
function Dropdown_value_withbanner($table, $myname, $value, $order, $banner) 
{
  $query = "SELECT * FROM $table ORDER BY \"$order\" ";
  $result = mysql_query($query);

  PRINT "<SELECT NAME=\"$myname\" SIZE=1>";
  PRINT "<OPTION VALUE=\"\">$banner</OPTION>";
  $i = 0;
  $number = MYSQL_NUMROWS($result); 
  if ($number > 0)
  {
/*	echo $value;
	if ($value == "" )
	{
	PRINT "<OPTION VALUE=\"\"></OPTION>";
	}
*/
    while ($i < $number)
    {	
      $output = mysql_result($result, $i, $order);
      if ($output == $value)
      {
        PRINT "<OPTION VALUE=\"$output\" selected>$output</OPTION>";
      } else
      {
        PRINT "<OPTION VALUE=\"$output\">$output</OPTION>";
      }
      $i++;
    }
  }
  ?>
  </SELECT>
  <?php }


//function Write_Log($name)
//{
//global $VERSION;

	//$fp=fopen("/logs/login.log", "a+");
//	$now = date("d-m-y/h:i");
	//$entry="$name on $now with version $VERSION";
//	$entry .= chr(10);
	//fwrite($fp, $entry);
//	fclose($fp);

//}

function get_system_id()
{
	$i = 0;
	$query = "SELECT systemid FROM systemid";
	$result = mysql_query($query);

	$id = mysql_result($result, $i, "systemid");
	return($id);
}

function update_system_id($id)
{
	$newid = $id + 1;
	$query = "UPDATE systemid SET systemid=$newid";
	$result = mysql_query($query);
	error();
} 


//Prevent from SQL Injection ->PHP - MySQL-----------------------------------------------------
/*
 * Insert backslash"\" prior characters \ , x00 , \n , \r , \ , ', " and \x1a
 * If magic quotes is enable then return the variable in its primary shape removing backslash
 * Examble:  "\' OR \'1=1"
 * SELECT * FROM (table_name) WHERE column_id1='value' AND column_id2= ' \' OR \'1=1 '
*/

function Sanitized($Input){

         //return (get_magic_quotes_qpc()) ?
           //mysql_real_escape_string(stripslashes($Input)):
             //mysql_real_escape_string($Input);
        		//return(mysql_real_escape_string(stripslashes($Input)));
		if(is_int($Input))
		   return(mysql_real_escape_string(stripslashes($Input)));
		 
}

//-------------------------------------------------------------------------------------------

//Prevent from XSS attacks-------------------------------------------------------------------
/* Prevent runing code <script>and</script> from the browser
 * Deactivating javascript code -> '<' and '>' isolation
 * Using this function the malicious code behave like plain text(string)not as javascript code
*/
function SanitizedXSS($Input){
	     
          		if(!(is_int($Input)))
		           //return str_replace('<',"&lt;",str_replace('>',"&gt;",$Input));
				  return(htmlspecialchars($Input));
				else
				   return(mysql_real_escape_string(stripslashes($Input)));
		  
}
//-------------------------------------------------------------------------------------------


//-------------------------------------------------------------------------------------------
function Concat($whom,$input){
	     if($input){
	               $whom=$whom.",".$input;
	               return ($whom);
	   }
}
//-------------------------------------------------------------------------------------------
?>
