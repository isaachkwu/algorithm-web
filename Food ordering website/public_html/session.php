<?php
   include("dbconfig.php");
   session_start();
   $checkuser = $_SESSION['loginuser'];
   $ses_sql = mysqli_query($conn,"select username, firstname from Userss where username = '$checkuser' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   $login_name = $row['firstname'];
?>