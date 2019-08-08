<?php
   include("dbconfig.php");
   session_start();
   if(!isset($_SESSION['loginuser'])){
	   header("location: login.php");
   }else{
	   header("location: acinfo.php");
   }
 ?>