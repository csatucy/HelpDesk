<?php
ob_start();

if( (empty($_SESSION['valid_user'])) || ($SESSION['valid_user']=="false") ){
  session_start();
   header("Location: "."../login.php");
 }
 
?>