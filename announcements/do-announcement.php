<?php
session_start();
require_once "../security.php";
require "../configs/config.inc.php";
require "../Libs/common.lib.php";
connectdb();
mysql_query("SET NAMES utf8");

error();
$id = $_GET['id'];
$act = $_GET['act'];
if ($act == "obsolete" ) {
$query = "UPDATE announce SET state=\"obsolete\" WHERE id=$id";
mysql_query($query);
echo "Error" ; error();
}
if ($act == "delete" ) {
$query = "DELETE FROM announce WHERE id=$id";
mysql_query($query);
echo "Error" ; error();
}

echo "Done! Redirecting to list.";
header("Location: announcements.php");
?>
