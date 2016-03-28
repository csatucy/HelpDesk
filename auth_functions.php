<?php

######################################################################
#     PHPIMP: PHP IMAP and POP Authentication function
#     ================================================
#
# Copyright (c) 2001 by Greg Lawler
# The Latest versin can be found at
# http://www.zinkwazi.com/pages.php?page_name=scripts
#
# If you find this script useful, feel free to send Starbucks Coffee
# gift certificates to me at
# 955 La Paz Road, Santa Barbara, CA 93108, USA  ;)
#
#
# This program is free software. You can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License.
######################################################################

######################################################################
#    INSTALLATION and USE
#    ====================
#
# phpimp.php eliminates the need to maintain/syncronize password lists
# you can just plug right into your organization's existing directory
# pass a username, password and server address to the function and
# phpimp.php will return true if the user is valid or false otherwise.
#
# phpimp.php includes two authentication functions, one for IMAP and 
# one for POP
# 
# phpimp has been tested with Microsoft Exchange Server 5.5 and 
# Redhat 6 and 7 IMAP servers
#
# NOTE: Not tested with PHP >= 4.0 (syntax changed sligtly)
######################################################################


function imap_authenticate( $username, $password, $auth_host )
{
  $tcp_port = "143";    // IMAP Server port, usually 143
  $server_reply = "";

  $fp = fsockopen( "$auth_host",$tcp_port );  // connect to IMAP port
  if ( $fp > 0 )  // make sure that you get a response...
    {
      $server_reply = fgets( $fp,128 );
      if ( ord( $server_reply ) == ord( "*" ))
	{
	 // print "server replied:&nbsp; &nbsp;$server_reply<br>";
	  $user_info=fputs( $fp, "a999 LOGIN ".$username ." ".$password . "\r\n" ); //send username and password
	  $server_reply = fgets( $fp,128 );
	  //echo "a999 LOGIN ".$username ." ".$password . "\r\n<br>";
	  //echo $server_reply;

	  $foo = strncmp($server_reply, "a999 OK Logged in", 17); //see if your login was valid
	  if ( $foo == "0")
	    {
	       // print "$server_reply!"; //password accepted
	      return true;
	    }
	  else
	    {
	      //print "$server_reply!"; //password not accepted
	      return false;
	    }
			
	  fputs( $fp, "a999 LOGOUT". "\r\n" );  //say goodbye...
	  $server_reply = fgets( $fp,128 );
	  // print "$server_reply<br>";
	  fclose( $fp );
	}
      else
	{
	  // print "problem conversing with $auth_host!";
	  return false;
	}
    }
  else //if you don't get a response, complain...
    {
      // print  "<BR>No response from $auth_host! is port $tcp_port open?....";
      return false;
    }
}  
	  
function pop_authenticate( $username, $password, $auth_host )
{
  $tcp_port = "110";    // POP Server port, usually 110

  $fp = fsockopen( "$auth_host",$tcp_port );  // connect to pop port
  if ( $fp > 0 )  // make sure that you get a response...
    {
      $user_info=fputs( $fp, "USER ".$username. "\r\n" ); //send username
      if ( !$user_info )
	{
	 $_SESSION['error_msg'] .= "problem conversing with $auth_host!";
	  return false;
	}
      else
	{

	   $server_reply = fgets( $fp,128 );
	 if ( ord($server_reply) == ord( "+" ))
	    {
	      // print "$server_reply......<br>";
	    }
		
		
	  $server_reply = fgets( $fp,128 );
	  if ( ord( $server_reply ) == ord( "+" ))
	    {
	      $_SESSION['error_msg'] .= "$server_reply.........<br>";
	      fputs( $fp, "PASS ".$password. "\r\n" );
	      $passwd_attempt = fgets( $fp,128 );
	      if ( ord( $passwd_attempt ) == ord( "+" ))
		{
		 // $_SESSION['error_msg'] .= "$passwd_attempt!"; //password accepted
		  return true;
		}
	      else
		{
		  //$_SESSION['error_msg'] .= "$passwd_attempt!"; //password failed
		  return false;
		}
	    }
	  fputs( $fp, "QUIT". "\r\n" );
	  fclose( $fp );
	}
    }
  else //if you don't get a response, complain...
    {
      // print  "<BR>No response from $auth_host! is port $tcp_port open?....";
      return false;
    }
}

?>
