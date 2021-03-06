<?php ###########################################
##
##	config.inc
##
##	When:		Who:	Version:	What:
##	20-10-99	ank 	0.1		adapted from IRM
##	10-03-00	ank	0.2		added $VERSION variable
##	07-12-00	ank	0.3		
##############################
# Welcome to the SI2 configuration File.

# Configuration options follow this syntax:
# 	$variable = "<value>";
# It is important that you put he double-quotes around the value.
# If you should need to insert a double-quote as the value its self,
#  escape it out by using a backslash (\").  For example:
#	$variale = "The dog said, \"I like beans.\"  Then he ate some.";
# Comments are marked with a hash, #, character as the first symbol.  
#
# VERSION: The version of SI2. Versions are named like 
# x.yzz where x is major release y is minor release and 
# zz is optional for bug-fixing releases.
$VERSION = "2.1p";
$AUTH_HOST="mail";
$SERVER_TYPE="imap";
# Section 1: Database Configuration
# ---------------------------------
# Currently, SI2 only supports MySQL.
# 
# cfg_dbname: The database server and port.
# Syntax: $cfg_dbname = "<server>:<port>";
# Default: $cfg_dbname = "localhost:3306";
$db_name = "localhost:3306";
$db_server = "localhost:3306";
#NSC $db_server = "localhost:3306"; 
# cfg_dbuser: The database user
# Syntax: $cfg_dbuser = "<db-user>";
# Default: $cfg_dbuser = "root";
$db_user = "helpadmin"; 
# cfg_dbpasswd: The dbuser's password.
# Syntax: $cfg_dbpasswd = "<password>";
# Default: $cfg_dbpasswd = "";
$db_passwd = "1234567890"; 
# cfg_dbdb: The database to use
# Syntax: $db_db = "<db>";
# Default: $dbdb = "si2";
$db_db = "helpdesk";
# Section 2: Functional Options
# -----------------------------
# cfg_notifyassignedbyemail: Notify a person by e-mail when someone assigned 
# a job to them.
# Syntax: $cfg_notifyassignedbyemail = <1|0>; (1, yes, 0, no).
# Default: $cfg_notifyasssignedbyemail = 1;
$cfg_notifyassignedbyemail = 0;
# cfg_notifynewtrackingbyemail:  Notify a person by email when new tracking is
# added.
# Syntax: $cfg_notifynewtrackingbyemail = <1|0>; (1, yes, 0, no).
# Default: $cfg_notifynewtrackingbyemail = 0;
$cfg_notifynewtrackingbyemail = 0;
# cfg_newtrackingemail: The email of the person to notify when new tracking is 
# added. (requires $cfg_notifynewtrackingbyemail = 1)
# Syntax: $cfg_newtrackingemail = "email@address.com";
# Default: $cfg_newtrackingemail = "user@host.com";
$cfg_newtrackingemail = "user@host.com";
# Section 3: Installation and Graphic Options
# -------------------------------------------
# PREFIX: The installed location of SI2, from the web-browsers point of view.
# Syntax: $PREFIX = "<path, i.e. /helpdesk/si2, /si2, /~johndoe/si2>";
# Default: $PREFIX = "/si2-<version>";
# $PREFIX = "/si2-0.1b1"; 
$PREFIX = "/phpHelpDesk"; 
# UPREFIX: The installed location of SI2 including access protocol and server,
# 		from the web-browsers point of view.
# Syntax: $UPREFIX = "http<s>://your.webserver.com/<path, i.e. /helpdesk/irm,
#		/irm, /~joeuser/irm>";
# Default: $UPREFIX = "http://your.system.here/irm-<version>";
# $UPREFIX = "http://your.system.here/si2-0.1b1"; 
$UPREFIX = "http://".$_SERVER['HTTP_HOST']."/phpHelpDesk"; 
# LOGO: The logo that appears over every page.
# Syntax: $LOGO = "<image file, i.e. irm_alt.jpg, http://pics.domain.com/irm.gif>";
# Default: $LOGO = "irm_alt.jpg";
# Notes: The second entry shows what other graphics were shipped with IRM:
#		irm.gif
$LOGO = "irm_alt.jpg";
/* $LOGO = "irm.gif"; */
# Section 4: Debugging
# Keep $DEBUG = 0 in normal operating mode. If you suspect
# a bug then turn this on $DEBUG = 1 to possibly discover
# what is happening.
#$DEBUG = 0;
$DEBUG = 1;
# Section 5: Misc
# $HELP = "main".
# A pointer into the help.php file to allow us some 
# context sensitive help.
$HELP = "main";
# End of configuration file.  Have a nice millenium.
?>
